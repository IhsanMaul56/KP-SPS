<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TabelSiswa extends Component
{
    public $kelas;
    public $jadwal;

    public function render()
    {

        $user = Auth::user();

        if ($user && $user->siswa_id) {
            $siswa = DB::table('data_siswas')
                ->where('nis', '=', $user->siswa_id)
                ->select('kelas_id')
                ->first(); // Mengambil data siswa dan kelas_id nya

            if ($siswa) {
                $kelasId = $siswa->kelas_id;

                $this->kelas = DB::table('data_kelas')
                    ->where('kode_kelas', '=', $kelasId)
                    ->value('nama_kelas'); // Mengambil nama_kelas berdasarkan kelas_id

                if ($kelasId && $this->kelas) {
                    $this->jadwal = DB::table('data_jadwals')
                        ->where('kelas_id', '=', $kelasId)
                        ->select('data_jadwals.*')
                        ->get(); // Mengambil semua data jadwal yang sesuai dengan kelas_id yang dimiliki siswa
                }
            }
        } else {
            $this->kelas = null;
        }

        return view('livewire.tabel-siswa');
    }
}
