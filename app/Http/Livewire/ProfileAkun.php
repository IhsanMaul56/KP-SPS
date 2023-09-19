<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileAkun extends Component
{
    use WithFileUploads;

    public $image;
    public $guru;
    public $siswa;

    public function render()
    {
        $user = Auth::user();
        if($user && $user->guru_id){
            $this->guru = DB::table('data_gurus')
            ->where('nip', $user->guru_id)
            ->value('foto_guru');
        }else if($user && $user->siswa_id){
            $this->siswa = DB::table('data_siswas')
            ->where('nis', $user->siswa_id)
            ->value('foto_siswa');
        }
        return view('livewire.profile-akun');
    }
}
