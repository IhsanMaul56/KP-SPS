<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfileAkun extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        if(Auth::user()->role === 'siswa'){
            $foto = DB::table('data_siswas')->where('nis', Auth::user()->siswa_id)->first();
            return view('livewire.profile-akun-siswa', compact('foto'));
        }
        else if(Auth::user()->role === 'guru')
            $fotos = DB::table('data_gurus')->where('nip', Auth::user()->guru_id)->first();
            return view('livewire.profile-akun-guru', compact('fotos'));
        
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // Maksimal ukuran 1MB
        ]);

        $siswas = Auth::user()->siswa;
        $gurus = Auth::user()->guru;
        if ($siswas) {
            $filename = $siswas->id . '.' . $this->photo->getClientOriginalExtension();
            $photo=$this->photo->storeAs('profile-pictures', $filename, 'public');
            
            $check=data_siswa::where('nis', Auth::user()->siswa_id)->update([
                'foto_siswa' => $filename
            ]);
            session()->flash('message', 'Foto profil berhasil diunggah.');
        } else if($gurus) {
            $filename = $user->id . '.' . $this->photo->getClientOriginalExtension();
            $photo=$this->photo->storeAs('profile-pictures', $filename, 'public');

            $checks=data_guru::where('nip', Auth::user()->guru_id)->update([
                'foto_guru' => $filename
            ]);
            session()->flash('message', 'Foto profil berhasil diunggah.');
        }
    }
    
}
