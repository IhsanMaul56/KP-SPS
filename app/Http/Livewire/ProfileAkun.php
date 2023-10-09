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
    if(Auth::user()->role == 'siswa'){
        $foto = DB::table('data_siswas')->where('nis', Auth::user()->siswa_id)->first();
        // dd($foto);
        return view('livewire.profile-akun-siswa', compact('foto'));
    }
    else if(Auth::user()->role == 'guru'){
        $fotos = DB::table('data_gurus')->where('nip', Auth::user()->guru_id)->first();
        // dd(compact('fotos'));
        return view('livewire.profile-akun-guru', compact('fotos'));
    }
    else if(Auth::user()->role == 'kurikulum'){
        $foto_k = DB::table('data_gurus')->where('nip', Auth::user()->guru_id)->first();
        return view('livewire.profile-akun-kurikulum', compact('foto_k'));
    }
    
}

public function updatedPhoto()
{
    $validationResult=$this->validate([
        'photo' => 'image|max:1024',
    ]);
    // dd($validationResult);
    $siswas = Auth::user()->siswa;
    $gurus = Auth::user()->guru;
    $kurikulums = Auth::user()->kurikulum;
    // dd($siswas);

    if ($siswas) {
        $counter=1;
        $filename = $siswas->id . 'foto_siswa-' . $counter . '.'. $this->photo->getClientOriginalExtension();

        // Periksa apakah nama file sudah digunakan, jika ya, tambahkan nomor berikutnya
        while (file_exists(public_path('storage/profile-pictures/' . $filename))) {
            $counter++;
            $filename = $siswas->id . 'foto_siswa-' . $counter . '.' . $this->photo->getClientOriginalExtension();
        }
        $photo = $this->photo->storeAs('profile-pictures', $filename, 'public');
        
        data_siswa::where('nis', Auth::user()->siswa_id)->update([
            'foto_siswa' => $filename
        ]);
    } else if ($gurus) {
        $counter=1;
        $filename = $gurus->id . 'foto_guru-' . $counter . '.' . $this->photo->getClientOriginalExtension();

        while (file_exists(public_path('storage/profile-pictures/' . $filename))) {
            $counter++;
            $filename = $gurus->id . 'foto_guru-' . $counter . '.' . $this->photo->getClientOriginalExtension();
        }
        $photo = $this->photo->storeAs('profile-pictures', $filename, 'public');

        data_guru::where('nip', Auth::user()->guru_id)->update([
            'foto_guru' => $filename
        ]);

        // dd($filename);
    } else if ($kurikulums) {
        $counter=1;
        $filename = $kurikulums->id . 'foto_guru-' . $counter . '.' . $this->photo->getClientOriginalExtension();

        while (file_exists(public_path('storage/profile-pictures/' . $filename))) {
            $counter++;
            $filename = $kurikulums->id . 'foto_guru-' . $counter . '.' . $this->photo->getClientOriginalExtension();
        }

        $photo = $this->photo->storeAs('profile-pictures', $filename, 'public');

        data_guru::where('id', Auth::user()->kurikulum_id)->update([
            'foto_kurikulum' => $filename
        ]);
        // dd($filename);
    } else {
        session()->flash('error', 'Anda tidak memiliki izin untuk mengunggah file.');
    }

    session()->flash('message', 'Foto profil berhasil diunggah.');
    }
}