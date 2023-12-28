<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_jadwal;
use Livewire\WithPagination;
use App\Exports\JadwalExport;
use App\Imports\JadwalImport;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class DataJadwal extends Component
{
    public $selectedJadwal;
    public $pengampuList;
    public $pengampu;
    public $tingkatList;
    public $kelasList;
    public $jadwals;
    public $data = [
        'pengampu_id' => '',
        'tingkat_id' => '',
        'kelas_id' => '',
        'hari' => '',
        'waktu_masuk' => '',
        'waktu_keluar' => '',
    ];
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    use WithFileUploads;
    public $file;

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->admin_id) {
            $jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                ->join('data_gurus', 'data_pengampus.pengampu_id', 'nip')
                ->select(
                    'data_jadwals.*',
                    'data_pengampus.nama_guru',
                    'data_pengampus.nama_mapel'
                )
                ->where(function ($query) {
                    $query->where('data_jadwals.hari', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_mapel', 'like', '%' . $this->search . '%')
                        ->orWhere('data_jadwals.nama_kelas', 'like', '%' . $this->search . '%');
                })
                ->where(function ($query) {
                    $query->where('is_delete', 0);
                })
                ->paginate(10);

            $this->pengampu = DB::table('data_pengampus')
                ->select('kode_pengampu', 'nama_guru', 'nama_mapel')
                ->get();

            // $this->pengampuList = $pengampu->pluck('nama_guru', 'kode_pengampu');

            $tingkat = DB::table('data_tingkats')
                ->select('kode_tingkat', 'nama_tingkat')
                ->get();

            $this->tingkatList = $tingkat->pluck('nama_tingkat', 'kode_tingkat');

            $kelas = DB::table('data_kelas')
                ->select('kode_kelas', 'nama_kelas')
                ->get();

            $this->kelasList = $kelas->pluck('nama_kelas', 'kode_kelas');
        } elseif ($user && $user->guru_id) {
            $jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                ->join('data_gurus', 'data_pengampus.pengampu_id', 'nip')
                ->select(
                    'data_jadwals.*',
                    'data_pengampus.nama_guru',
                    'data_pengampus.nama_mapel'
                )
                ->where(function ($query) {
                    $query->where('data_jadwals.hari', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_mapel', 'like', '%' . $this->search . '%')
                        ->orWhere('data_jadwals.nama_kelas', 'like', '%' . $this->search . '%');
                })
                ->where(function ($query) {
                    $query->where('is_delete', 0);
                })
                ->paginate(10);

            $pengampu = DB::table('data_pengampus')
                ->select('kode_pengampu', 'nama_guru', 'nama_mapel')
                ->get();

            $this->pengampuList = $pengampu->pluck('nama_guru', 'kode_pengampu');

            $tingkat = DB::table('data_tingkats')
                ->select('kode_tingkat', 'nama_tingkat')
                ->get();

            $this->tingkatList = $tingkat->pluck('nama_tingkat', 'kode_tingkat');

            $kelas = DB::table('data_kelas')
                ->select('kode_kelas', 'nama_kelas')
                ->get();

            $this->kelasList = $kelas->pluck('nama_kelas', 'kode_kelas');
        } else {
            $jadwal = null;
        }

        return view('livewire.data-jadwal', compact('jadwal'));
    }

    public function exportTemplate()
    {
        $fileName = 'data-jadwal.xlsx';
        $path = public_path('file/' . $fileName);

        return response()->download($path, $fileName, [
            'Content-Type' => 'aplication/vnd.ms.excel',
            'Contnrt-Dispotition' => 'inline; filename="' . $fileName . '"'
        ]);
    }

    public function exportData()
    {
        $fileName = 'data-guru-pengampu.xlsx';

        return Excel::download(new JadwalExport, $fileName);
    }

    public function importJadwal()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx, xls'
        ]);

        try {
            Excel::import(new JadwalImport, $this->file);
            // If the import is successful
            session()->flash('berhasil', 'Data Berhasil Diimport');
        } catch (\Exception $e) {
            // If there is an error during the import
            session()->flash('gagal', $e->getMessage()); // Menggunakan pesan kesalahan dari exception
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function tampil()
    {
        return view('partials.jadwal-mapel');
    }

    public function deleteJadwalConfirm($kode_jadwal)
    {
        $this->selectedJadwal = data_jadwal::find($kode_jadwal);
    }

    public function deleteJadwal()
    {
        if ($this->selectedJadwal) {
            data_jadwal::where('kode_jadwal', $this->selectedJadwal->kode_jadwal)->delete();
            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }
        $this->resetPage();
        return redirect()->route('m-jadwal');
    }

    public function editJadwal($kodeJadwal)
    {
        $this->jadwals = data_jadwal::find($kodeJadwal);
        if ($this->jadwals) {
            $this->selectedJadwal = $kodeJadwal;
            $this->data = [
                'pengampu_id' => $this->jadwals->pengampu_id,
                'tingkat_id' => $this->jadwals->tingkat_id,
                'kelas_id' => $this->jadwals->kelas_id,
                'hari' => $this->jadwals->hari,
                'waktu_masuk' => $this->jadwals->waktu_masuk,
                'waktu_keluar' => $this->jadwals->waktu_keluar,
            ];
        }
    }

    public function updateSelectedJadwal()
    {
        $this->validate([
            'data.pengampu_id' => 'required',
            'data.tingkat_id' => 'required',
            'data.kelas_id' => 'required',
            'data.hari' => 'required',
            'data.waktu_masuk' => 'required',
            'data.waktu_keluar' => 'required',
        ]);

        try {
            $tingkatData = DB::table('data_tingkats')
                ->where('kode_tingkat', $this->data['tingkat_id'])
                ->value('nama_tingkat');

            $kelasData = DB::table('data_kelas')
                ->where('kode_kelas', $this->data['kelas_id'])
                ->value('nama_kelas');

            $input = data_jadwal::where('kode_jadwal', $this->selectedJadwal)->update([
                'pengampu_id' => $this->data['pengampu_id'],
                'tingkat_id' => $this->data['tingkat_id'],
                'nama_tingkat' => $tingkatData,
                'kelas_id' => $this->data['kelas_id'],
                'nama_kelas' => $kelasData,
                'hari' => $this->data['hari'],
                'waktu_masuk' => $this->data['waktu_masuk'],
                'waktu_keluar' => $this->data['waktu_keluar'],
            ]);

            session()->flash('berhasilUpdate', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            session()->flash('gagalUpdate', 'Terjadi Kesalahan Saat Mengupdate Data' . $e->getMessage());
        }
        return redirect()->route('m-jadwal');
    }
}