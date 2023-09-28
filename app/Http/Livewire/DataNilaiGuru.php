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
    public $tingkat = [];
    public $kelas = [];
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

            if ($this->mapelSelected) {
                $pengampuId = $this->guru->pluck('kode_pengampu')->toArray();
    
                $this->jadwal = DB::table('data_jadwals')
                    ->whereIn('pengampu_id', $pengampuId)
                    ->select('tingkat_id', 'kelas_id', 'pengampu_id')
                    ->get();
    
                if ($this->jadwal) {
                    $tingkatData = DB::table('data_tingkats')
                        ->whereIn('kode_tingkat', $this->jadwal->pluck('tingkat_id')->toArray())
                        ->select('nama_tingkat')
                        ->get();

                    if($tingkatData->count() > 0){
                        $tingkat = $tingkatData->pluck('nama_tingkat')->toArray();
                        $this->tingkat = $tingkat;
                    } else {
                        $this->tingkat = [];
                    }

                    if ($this->tingkat && $this->tingkatSelected) {
                
                        // Query untuk mendapatkan data kelas
                        $kelasData = DB::table('data_pengampus')
                            ->whereIn('kode_pengampu', $pengampuId)
                            ->where('nama_mapel', $this->mapelSelected)
                            ->join('data_jadwals', 'data_pengampus.kode_pengampu', '=', 'data_jadwals.pengampu_id')
                            ->join('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                            ->join('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                            ->where('data_tingkats.nama_tingkat', 'LIKE', '%' . $this->tingkatSelected . '%')
                            ->select('data_kelas.nama_kelas')
                            ->distinct()
                            ->get();
                
                        if ($kelasData->count() > 0) {
                            $kelas = $kelasData->pluck('nama_kelas')->toArray();
                            $this->kelas = $kelas;
                        } else {
                            $this->kelas = [];
                        }
                    } else {
                        $this->kelas = [];
                    }
                } else {
                    $this->tingkat = [];
                }
            }
        }

        return view('livewire.data-nilai-guru');
    }

    public function updatedMapelSelected()
    {
        // Set tingkat menjadi kosong ketika mata pelajaran diubah
        $this->tingkatSelected = null;
        // Reset pilihan kelas
        $this->kelasSelected = null;
    }

    public function updatedTingkatSelected()
    {
        // Set kelas menjadi kosong ketika tingkat diubah
        $this->kelasSelected = null;
    }

    public function cari()
    {
        if ($this->mapelSelected && $this->kelasSelected && $this->tingkatSelected) {
            $user = Auth::user();
            $guruId = $user->guru_id;

            $results = DB::table('data_siswas')
                ->join('data_jadwals', 'data_siswas.kelas_id', '=', 'data_jadwals.kelas_id')
                ->join('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                ->where('data_pengampus.nama_mapel', '=', $this->mapelSelected)
                ->where('data_jadwals.nama_tingkat', 'LIKE', '%' . $this->tingkatSelected . '%')
                ->where('data_jadwals.nama_kelas', 'LIKE', '%' . $this->kelasSelected . '%')
                ->whereIn('data_jadwals.pengampu_id', function ($query) use ($guruId) {
                    $query->select('kode_pengampu')
                        ->from('data_pengampus')
                        ->where('pengampu_id', $guruId);
                })
                ->select('data_siswas.*')
                ->distinct()
                ->get();

            $this->siswa = collect($results);
        } else {
            $this->siswa = collect();
        }
    }
}
