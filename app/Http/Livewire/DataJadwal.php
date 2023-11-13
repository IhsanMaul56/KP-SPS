<?php

namespace App\Http\Livewire;

use App\Exports\JadwalExport;
use App\Imports\JadwalImport;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class DataJadwal extends Component
{
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
                ->select(
                    'data_jadwals.*',
                    'data_pengampus.nama_guru',
                    'data_pengampus.nama_mapel'
                )
                ->where(function ($query) {
                    $query->where('data_jadwals.hari', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%')
                        ->orWhere('data_jadwals.nama_tingkat', 'like', '%' . $this->search . '%')
                        ->orWhere('data_jadwals.nama_kelas', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_mapel', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);

        } elseif ($user && $user->guru_id) {
            $jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
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
                ->paginate(10);

        } else {
            $jadwal = null;
        }

        return view('livewire.data-jadwal', compact('jadwal'));
    }

    public function exportTemplate()
    {
        $fileName = 'data-jadwal.xlsx';
        $path = public_path('file/'.$fileName);

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
        session()->flash('berhasil', 'Data berhasil diimport.');
    } catch (\Exception $e) {
        // If there is an error during the import
        session()->flash('error', 'Gagal mengimport data. Pastikan format file benar dan coba lagi.');
    }

        Excel::import(new JadwalImport, $this->file);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.jadwal-mapel');
    }
}