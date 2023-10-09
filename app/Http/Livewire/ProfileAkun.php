<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_guru;
use App\Models\data_siswa;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
    else if(Auth::user()->role === 'guru'){
        $fotos = DB::table('data_gurus')->where('nip', Auth::user()->guru_id)->first();
        return view('livewire.profile-akun-guru', compact('fotos'));
    }
    else if(Auth::user()->role === 'kurikulum'){
        $foto_k = DB::table('data_gurus')->where('nip', Auth::user()->guru_id)->first();
        return view('livewire.profile-akun-kurikulum', compact('foto_k'));
    }
}

public function updatedPhoto()
{
    $this->validate([
        'photo' => 'image|max:1024',
    ]);

    $siswas = Auth::user()->siswa;
    $gurus = Auth::user()->guru;
    $kurikulums = Auth::user()->kurikulum;

    if ($siswas) {
        $filename = $siswas->id . '.' . $this->photo->getClientOriginalExtension();
        $photo = $this->photo->storeAs('profile-pictures', $filename, 'public');
        
        data_siswa::where('nis', Auth::user()->siswa_id)->update([
            'foto_siswa' => $filename
        ]);
    } else if ($gurus) {
        $filename = $gurus->id . '.' . $this->photo->getClientOriginalExtension();
        $photo = $this->photo->storeAs('profile-pictures', $filename, 'public');

        data_guru::where('nip', Auth::user()->guru_id)->update([
            'foto_guru' => $filename
        ]);
    } else if ($kurikulums) {
        $filename = $kurikulums->id . '.' . $this->photo->getClientOriginalExtension();
        $photo = $this->photo->storeAs('profile-pictures', $filename, 'public');

        data_guru::where('id', Auth::user()->kurikulum_id)->update([
            'foto_kurikulum' => $filename
        ]);
    }

    session()->flash('message', 'Foto profil berhasil diunggah.');
    }
}