<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AkunSiswa extends Component
{
    public $siswa1;
    public $siswa2;
    public $data;
    
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
    
    public function mount(){
        $user = Auth::user();
    
        if ($user && $user->siswa_id) {
            $this->data = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->select('nis', 'alamat', 'no_hp')
                ->get();
        }
    }
    
    public function update(){
        foreach ($this->data as $row) {
            DB::table('data_siswas')
                ->where('nis', $row->nis)
                ->update([
                    'alamat' => $row->alamat,
                    'no_hp' => $row->no_hp
                ]);
        }
    
        // Setelah update, kosongkan data
        $this->data = [];
    }
}
