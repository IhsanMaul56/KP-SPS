<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ProfileAkun extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.profile-akun');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // Maksimal ukuran 1MB
        ]);

        $user = Auth::user();

        if ($user) {
            $filename = $user->id . '.' . $this->photo->getClientOriginalExtension();
            $this->photo->storeAs('profile-pictures', $filename, 'public');

            $user->update([
                'profile_picture' => $filename,
            ]);

            session()->flash('message', 'Foto profil berhasil diunggah.');
        }
        $this->updatedPhoto();
    }
    
}
