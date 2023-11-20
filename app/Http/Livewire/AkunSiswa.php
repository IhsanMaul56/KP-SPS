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
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat' => '',
        'no_hp' => '',
    ];
    public $password;
    public $email;   

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
    
    public function changePassword(){
        $user = Auth::user();
        
        try{
            if($user && $user->siswa_id){
                if($this->email != $user->email){
                    Session::flash('gagal', 'Email yang dimasukkan salah');
                }elseif($this->password == null){
                    Session::flash('gagal', 'Password harus di isi!');
                }else{
                    DB::table('users')
                    ->where('siswa_id', $user->siswa_id)
                    ->where('email', $user->email)
                    ->update([
                        'password' => bcrypt($this->password)
                    ]);
                    Session::flash('berhasil', 'Password berhasil di update');
                }
                // dd($this->password, $user);
            }else{
                Session::flash('gagal', 'Password gagal di update');
            }
        }catch(\Exception $e){
            Session::flash('gagal', 'Password tidak boleh Kosong');
        }

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

            Session::flash('message', 'Data Berhasil Diupdate');
            
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

    public function profile()
    {
        return view('layouts.siswa-profile');
    }
}
