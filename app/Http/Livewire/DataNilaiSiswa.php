<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DataNilaiSiswa extends Component
{
    public $nis;

    public function render()
    {
        $siswa = DB::table('data_siswas')
            ->leftJoin('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
            ->leftJoin('data_jadwals', 'data_kelas.kode_kelas', '=', 'data_jadwals.kelas_id')
            ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
            ->where('data_siswas.nis', '=', $this->nis)
            ->select(
                'data_siswas.nama_siswa',
                'data_siswas.nis',
                'data_kelas.nama_kelas',
                'data_kelas.nama_tingkat',
                'data_kelas.nama_tahun',
                'data_pengampus.nama_mapel',
                'data_pengampus.kode_pengampu',
            )
            ->first();
        
        if($siswa){
            return view('livewire.data-nilai-siswa')->with('siswa', $siswa);
        } else {
            session()->flash('gagal', 'Siswa tidak ditemukan.');
        }
    }

    public function mount($nis)
    {
        $this->nis = $nis;
    }
}
