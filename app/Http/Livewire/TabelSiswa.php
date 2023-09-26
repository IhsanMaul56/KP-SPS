<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TabelSiswa extends Component
{
    public $kelas;
    public $siswa;
    public $tingkat;
    public $jadwal;
    public $pengampu;

    public function render()
    {
        $user = Auth::user();
        $this->jadwal = [];

        if ($user && $user->siswa_id) {
            $this->siswa = DB::table('data_siswas')
                ->where('nis', '=', $user->siswa_id)
                ->select('data_siswas.*')
                ->get();
    
            if ($this->siswa) {
                $tingkatId = $this->siswa->pluck('tingkat_id')->toArray();
                $kelasId = $this->siswa->pluck('kelas_id')->toArray();
    
                $this->tingkat = DB::table('data_tingkats')
                    ->where('kode_tingkat', '=', $tingkatId)
                    ->value('nama_tingkat');
    
                $this->kelas = DB::table('data_kelas')
                    ->where('kode_kelas', '=', $kelasId)
                    ->value('nama_kelas');
    
                if ($kelasId && $this->kelas && $this->tingkat) {
                    $this->jadwal = DB::table('data_jadwals')
                        ->where('kelas_id', '=', $kelasId)
                        ->select('data_jadwals.*')
                        ->get();

                        // dd($this->jadwal);
    
                    $this->pengampu = DB::table('data_pengampus')
                        ->select('data_pengampus.*')
                        ->get();
                }
            }
        } else {
            $this->kelas = null;
        }

        return view('livewire.tabel-siswa');
    }


}
