<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AkunSiswa extends Component
{
    public $siswa1;
    public $siswa2;
    public $data = [
        'alamat' => '',
        'no_hp' => '',
    ];   

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            // Mengambil email dari tabel users
            $this->siswa1 = DB::table('users')
                ->where('id', $user->id)
                ->value('email');
        
            if ($this->siswa1) {
                $this->siswa2 = DB::table('data_siswas')
                    ->where('nis', $user->siswa_id)
                    ->get();
            }
        }
        
        return view('livewire.akun-siswa');
    }
    
    public function update()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            
            DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->update([
                    'alamat' => $this->data['alamat'],
                    'no_hp' => $this->data['no_hp'],
                ]);

            Session::flash('message', 'Data berhasil di update');
            
        }
        
    }

    public function mount()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            // Mengambil data dari database dan mengisi properti $data
            $siswaData = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->first();

            if ($siswaData) {
                $this->data['alamat'] = $siswaData->alamat;
                $this->data['no_hp'] = $siswaData->no_hp;
            }
        }
    }
}
