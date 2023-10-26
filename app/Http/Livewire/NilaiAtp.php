<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class NilaiAtp extends Component
{
    public $akademikList;
    public $mapelList;
    
    public function render()
    {
        $tahunAkademik = DB::table('tahun_akademiks')
        ->select('kode_tahun', 'tahun_akademik')
        ->get();

        $this->akademikList = $tahunAkademik->pluck('tahun_akademik');

        $mataPelajaran = DB::table('data_mapels')
        ->select('kode_mapel', 'nama_mapel')
        ->get();

        $this->mapelList = $mataPelajaran->pluck('nama_mapel');
        return view('livewire.nilai-atp');
    }

    public function tampil()
    {
        return view('livewire.lihat-atp');
    }
}
