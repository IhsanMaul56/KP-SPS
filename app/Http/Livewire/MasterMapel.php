<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_mapel;
use App\Models\data_pengampu;
use App\Models\data_jadwal;
use App\Models\nilai_formatif;
use App\Models\nilai_sumatif;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MasterMapel extends Component
{
    public $search = '';
    public $nama_mapel;
    public $mapelSelectedId;
    public $showModal = false;
    public $data = [
        'kode_mapel' => '',
        'nama_mapel' => ''
    ];
    public $selectedPengampuId;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $mapel = DB::table('data_mapels')
            ->select('data_mapels.*')
            ->where(function ($query) {
                $query->where('data_mapels.nama_mapel', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.master-mapel', compact('mapel'));
    }

    public function createMapel()
    {
        $this->validate([
            'nama_mapel' => 'required'
        ]);

        // Periksa apakah data_mapel dengan nama yang sama sudah ada
        $cekMapel = data_mapel::where('nama_mapel', $this->nama_mapel)->first();

        if ($cekMapel) {
            // Data sudah ada, tampilkan notifikasi
            session()->flash('gagal', 'Mata Pelajaran Sudah Ada');
        } else {
            // Data belum ada, tambahkan ke tabel data_mapel
            try {
                data_mapel::create([
                    'nama_mapel' => $this->nama_mapel
                ]);

                $this->showModal = false;
                session()->flash('berhasil', 'Data Berhasil Ditambahkan');
            } catch (\Exception $e) {
                session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data mata pelajaran: ' . $e->getMessage());
            }
        }
        return redirect()->route('master-mapel');
    }

    public function editMapel($mapelId)
    {
        $mapel = data_mapel::find($mapelId);
        if ($mapel) {
            $this->mapelSelectedId = $mapelId;
            $this->data = [
                'kode_mapel' => $mapel->kode_mapel,
                'nama_mapel' => $mapel->nama_mapel
            ];
            $this->showModal = true;
        }
    }

    public function updateSelectedMapel()
    {
        $this->validate([
            'data.nama_mapel' => 'required'
        ]);

        try {
            data_mapel::where('kode_mapel', $this->data)->update([
                'nama_mapel' => $this->data['nama_mapel']
            ]);

            $this->showModal = false;
            session()->flash('berhasil', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data mata pelajaran: ' . $e->getMessage());
        }
        return redirect()->route('master-mapel');
    }

    public function deleteMapelConfirm($kode_mapel)
    {
        $this->mapelSelectedId = data_mapel::find($kode_mapel);
    }

    public function deleteMapel()
    {
        if ($this->mapelSelectedId) {
            $kode_mapel = $this->mapelSelectedId->kode_mapel;
            $data_pengampus = data_pengampu::where('mapel_id', $kode_mapel)->get();

            if ($data_pengampus->count() > 0) {
                foreach ($data_pengampus as $data_pengampu) {
                    data_jadwal::where('pengampu_id', $data_pengampu->kode_pengampu)->delete();
                    $data_pengampu->delete();
                }
            }

            nilai_formatif::where('mapel_id', $kode_mapel)->delete();
            nilai_sumatif::where('mapel_id', $kode_mapel)->delete();
            data_mapel::where('kode_mapel', $kode_mapel)->delete();
            Session::flash('berhasil', 'Data Berhasil Dihapus');
        }

        $this->resetPage();
        return redirect()->route('master-mapel');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->nama_mapel = null;
    }

    public function tampil()
    {
        return view('partials.mapel-master');
    }
}
