<?php

namespace App\Http\Livewire;

use App\Models\BobotNilai;
use App\Models\data_jadwal;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\data_pengampu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataGuruMapel extends Component
{
    public $guruList;
    public $mapelList;
    public $pengampu_id, $mapel_id;
    
    public $data = [
        'kode_pengampu' => '',
        'pengampu_id' => '',
        'mapel_id' => '',
    ];
    public $selectedPengampuId;

    public $search = '';
    public $gagalMessage = '';


    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $guru = DB::table('data_gurus')
            ->select('nip', 'nama_guru')
            ->get();

        $this->guruList = $guru->pluck('nama_guru', 'nip');

        $mapel = DB::table('data_mapels')
            ->select('kode_mapel', 'nama_mapel')
            ->get();

        $this->mapelList = $mapel->pluck('nama_mapel', 'kode_mapel');

        $pengampu = DB::table('data_pengampus')
            ->leftJoin('data_gurus', 'data_pengampus.pengampu_id', '=', 'data_gurus.nip')
            ->select(
                'data_pengampus.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->where(function ($query) {
                $query->where('data_pengampus.pengampu_id', 'like', '%' . $this->search . '%')
                    ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%')
                    ->orWhere('data_pengampus.nama_mapel', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.data-guru-mapel', compact('pengampu'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function tampil()
    {
        return view('partials.mapel-guru');
    }

    public function createPengampu()
    {
        $this->validate([
            'pengampu_id' => 'required',
            'mapel_id' => 'required'
        ]);

        // Cek apakah pengampu sudah mengambil mapel ini sebelumnya
        $cekPengampu = data_pengampu::where('mapel_id', $this->mapel_id)
            ->where('pengampu_id', $this->pengampu_id)
            ->first();

            if ($cekPengampu) {
                // Pengampu sudah mengambil mapel ini, notif pesan kesalahan
                session()->flash('gagal', 'Anda Sudah Mengambil Mata Pelajaran Ini');
                return redirect()->route('data-mapels');
            }

        $guruData = DB::table('data_gurus')
            ->where('nip', $this->pengampu_id)
            ->value('nama_guru');

        $mapelData = DB::table('data_mapels')
            ->where('kode_mapel', $this->mapel_id)
            ->value('nama_mapel');

        try {
            data_pengampu::create([
                'pengampu_id' => $this->pengampu_id,
                'nama_guru' => $guruData,
                'mapel_id' => $this->mapel_id,
                'nama_mapel' => $mapelData
            ]);

            session()->flash('berhasil', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            Session::flash('gagal', 'Terjadi Kesalahan Saat Menambahkan Data: ' . $e->getMessage());
        }
        return redirect()->route('data-mapels');
    }

    public function editPengampu($pengampuId)
    {
        $pengampu = data_pengampu::find($pengampuId);
        if ($pengampu) {
            $this->selectedPengampuId = $pengampuId;
            $this->data = [
                'kode_pengampu' => $pengampu->kode_pengampu,
                'pengampu_id' => $pengampu->pengampu_id,
                'mapel_id' => $pengampu->mapel_id
            ];
        }
    }

    public function updateSelectedPengampu()
    {
        $this->validate([
            'data.pengampu_id' => 'required',
            'data.mapel_id' => 'required',
        ]);

        $guruData = DB::table('data_gurus')
            ->where('nip', $this->data['pengampu_id'])
            ->value('nama_guru');

        $mapelData = DB::table('data_mapels')
            ->where('kode_mapel', $this->data['mapel_id'])
            ->value('nama_mapel');

        try {
            data_pengampu::where('kode_pengampu', $this->selectedPengampuId)->update([
                'pengampu_id' => $this->data['pengampu_id'],
                'nama_guru' => $guruData,
                'mapel_id' => $this->data['mapel_id'],
                'nama_mapel' => $mapelData
            ]);

            session()->flash('berhasil', 'Data Berhasil Diupdate.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi Kesalahan Saat Mengupdate Data' . $e->getMessage());
        }
        return redirect()->route('data-mapels');
    }

    public function deletePengampuConfirm($kode_pengampu)
    {
        $this->selectedPengampuId = data_pengampu::find($kode_pengampu);
    }

    public function deletePengampu()
    {
        if ($this->selectedPengampuId) {
            data_jadwal::where('pengampu_id', $this->selectedPengampuId->kode_pengampu)->delete();
            BobotNilai::where('pengampu_id', $this->selectedPengampuId->kode_pengampu)->delete();
            data_pengampu::where('kode_pengampu', $this->selectedPengampuId->kode_pengampu)->delete();
            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('data-mapels');
    }
}
