<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AkunSiswa extends Component
{
    public $siswa1;
    public $siswa2;

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            // Mengambil email dari tabel users
            $this->siswa1 = DB::table('users')
                ->where('id', $user->id) // Mengganti dengan kondisi yang sesuai
                ->value('email'); // Mengambil nilai langsung dari kolom email
        
            if ($this->siswa1) {
                $this->siswa2 = DB::table('data_siswas')
                    ->where('nis', $user->siswa_id)
                    ->get();
            }
        }

        return view('livewire.akun-siswa');
    }

    public function update(){
        $user = Auth::user();
        if ($user && $user->siswa_id) {
            $siswa = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->first();

            if ($siswa) {
                // Lakukan pembaruan alamat di sini sesuai kebutuhan
                // Misalnya, Anda ingin mengganti alamat dengan nilai baru 'Alamat Baru'
                $newAlamat = $siswa->alamat;

                // Lakukan update pada tabel data_siswas
                DB::table('data_siswas')
                    ->where('nis', $user->siswa_id)
                    ->update(['alamat' => $newAlamat]);

                // Anda juga dapat memberikan pesan sukses atau lainnya jika diperlukan
                session()->flash('message', 'Alamat berhasil diperbarui.');
            } else {
                // Handle jika data siswa tidak ditemukan
                session()->flash('message', 'Data siswa tidak ditemukan.');
            }
        }
    }
}
