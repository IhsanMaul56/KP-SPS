<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\data_siswa;
use DB;

class ProfileAkun extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        $foto = DB::table('data_siswas')->where('nis', Auth::user()->siswa_id)->first();
        return view('livewire.profile-akun', compact('foto'));
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // Maksimal ukuran 1MB
        ]);

        $user = Auth::user();
        if ($user) {
            $filename = $user->id . '.' . $this->photo->getClientOriginalExtension();
            $photo=$this->photo->storeAs('profile-pictures', $filename, 'public');
            
            $check=data_siswa::where('nis', Auth::user()->siswa_id)->update([
                'foto_siswa' => $filename
            ]);
            
            session()->flash('message', 'Foto profil berhasil diunggah.');
        }
    }
    
}
