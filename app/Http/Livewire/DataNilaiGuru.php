<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataNilaiGuru extends Component
{
    public $guru;
    public $jadwal;
    public $siswa;
    public $tingkat;
    public $kelas;
    public $mapelSelected = "";
    public $tingkatSelected = "";
    public $kelasSelected = "";

    public function render()
    {
        $this->cari();
        
        $user = Auth::user();

        if ($user && $user->guru_id) {
            $this->guru = DB::table('data_pengampus')
                ->where('pengampu_id', '=', $user->guru_id)
                ->select('data_pengampus.*')
                ->get();

            if ($this->guru) {
                $pengampuId = $this->guru->pluck('kode_pengampu')->toArray();

                $this->jadwal = DB::table('data_jadwals')
                    ->whereIn('pengampu_id', $pengampuId)
                    ->select('tingkat_id', 'kelas_id')
                    ->get();
                    
                if ($this->jadwal) {
                    $tingkatIds = $this->jadwal->pluck('tingkat_id')->toArray();
                    $kelasIds = $this->jadwal->pluck('kelas_id')->toArray();

                    $this->tingkat = DB::table('data_tingkats')
                        ->whereIn('kode_tingkat', $tingkatIds)
                        ->select('nama_tingkat')
                        ->get();
                        
                    $this->kelas = DB::table('data_kelas')
                        ->whereIn('kode_kelas', $kelasIds)
                        ->select('nama_kelas')
                        ->get();
                }
            }
        }

        return view('livewire.data-nilai-guru');
    }

    public function cari()
    {
        if ($this->mapelSelected && $this->kelasSelected) {
            $results = DB::table('data_siswas')
                ->join('data_jadwals', 'data_siswas.kelas_id', '=', 'data_jadwals.kelas_id')
                ->join('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                ->where('data_pengampus.nama_mapel', '=', $this->mapelSelected)
                ->where('data_jadwals.nama_kelas', 'LIKE', '%' . $this->kelasSelected . '%')
                ->select('data_siswas.*')
                ->get();

            // Convert the results to a collection
            $this->siswa = collect($results);
        } else {
            // Initialize $siswa as an empty collection
            $this->siswa = collect();
        }
    }
   
}
