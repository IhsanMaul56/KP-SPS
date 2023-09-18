<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TabelSiswa extends Component
{
    public $kelas;
    public $tingkat;
    public $jadwal;
    public $pengampu;

    // public function render()
    // {

    //     $user = Auth::user();

    //     if ($user && $user->siswa_id) {
    //         $siswa = DB::table('data_siswas')
    //             ->where('nis', '=', $user->siswa_id)
    //             ->select('data_siswas.*')
    //             ->first(); // Mengambil data siswa dan kelas_id nya

    //         if ($siswa) {
    //             $kelasId = $siswa->kelas_id;

    //             $this->tingkat = DB::table('data_tingkats')
    //                 ->where('kode_tingkat', '=', $kelasId)
    //                 ->value('nama_tingkat');

    //             $this->kelas = DB::table('data_kelas')
    //                 ->where('kode_kelas', '=', $kelasId)
    //                 ->value('nama_kelas');

    //             if ($kelasId && $this->kelas & $this->tingkat) {
    //                 $this->jadwal = DB::table('data_jadwals')
    //                     ->where('kelas_id', '=', $kelasId)
    //                     ->select('data_jadwals.*')
    //                     ->get(); // Mengambil semua data jadwal yang sesuai dengan kelas_id yang dimiliki siswa
                    
    //                 if($this->jadwal){
    //                     $this->pengampu = DB::table('data_pengampus')
    //                         ->where('kode_pengampu', '=', $this->jadwal)
    //                         ->select('data_pengampus.*')
    //                         ->first();
    //                 }
    //             }
    //         }
    //     } else {
    //         $this->kelas = null;
    //     }

    //     return view('livewire.tabel-siswa');
    // }

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            $siswa = DB::table('data_siswas')
                ->where('nis', '=', $user->siswa_id)
                ->select('data_siswas.*')
                ->first(); // Mengambil data siswa dan kelas_id nya

            if ($siswa) {
                $kelasId = $siswa->kelas_id;

                $this->tingkat = DB::table('data_tingkats')
                    ->where('kode_tingkat', '=', $kelasId)
                    ->value('nama_tingkat');

                $this->kelas = DB::table('data_kelas')
                    ->where('kode_kelas', '=', $kelasId)
                    ->value('nama_kelas');

                if ($kelasId && $this->kelas && $this->tingkat) {
                    $this->jadwal = DB::table('data_jadwals')
                        ->where('kelas_id', '=', $kelasId)
                        ->select('data_jadwals.*')
                        ->get(); // Mengambil semua data jadwal yang sesuai dengan kelas_id yang dimiliki siswa

                    $this->pengampu = DB::table('data_pengampus')
                        ->select('data_pengampus.*')
                        ->get();
    
                    // Memastikan pengampu tidak null
                    if (!$this->pengampu->isEmpty()) {
                        // Loop melalui jadwal dan mencari data pengampu yang sesuai
                        foreach ($this->jadwal as $item) {
                            $matchingPengampu = $this->pengampu->firstWhere('kode_pengampu', $item->pengampu_id);
    
                            if ($matchingPengampu) {
                                $this->pengampu[] = $matchingPengampu;
                            } else {
                                $this->pengampu[] = null;
                            }
                        }
                    }
                }
            }
        } else {
            $this->kelas = null;
        }

        return view('livewire.tabel-siswa');
    }


}
