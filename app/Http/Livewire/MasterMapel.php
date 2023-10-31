<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_mapel;
use App\Models\data_pengampu;
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

        try{
            data_mapel::create([
                'nama_mapel' => $this->nama_mapel
            ]);

            $this->showModal = false;
            session()->flash('berhasil', 'Data mata pelajaran berhasil disimpan.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data mata pelajaran: ' . $e->getMessage());
        }
    }

    public function editMapel($mapelId)
    {
        $mapel = data_mapel::find($mapelId);
        if($mapel){
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

        try{
            data_mapel::where('kode_mapel', $this->data)->update([
                'nama_mapel' => $this->data['nama_mapel']
            ]);

            $this->showModal = false;
            session()->flash('berhasil', 'Data mata pelajaran berhasil diupdate.');
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi kesalahan saat menyimpan data mata pelajaran: ' . $e->getMessage());
        }
    }

    public function deleteMapelConfirm($kode_kelas)
    {
        $this->mapelSelectedId = data_mapel::find($kode_kelas);
    }

    public function deleteMapel()
    {
        if($this->mapelSelectedId){
            data_pengampu::where('mapel_id', $this->mapelSelectedId->kode_mapel)->delete();
            data_mapel::where('kode_mapel', $this->mapelSelectedId->kode_mapel)->delete();
            Session::flash('berhasil', 'Data berhasil dihapus');
        }
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->nama_mapel = null;
    }

    public function tampil(){
        return view('partials.mapel-master');
    }
}
