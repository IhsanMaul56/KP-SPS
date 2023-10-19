<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DataAdmin extends Component
{
    public $countAdmin;
    public $countGuru;
    public $countSiswa;
    public $countKurikulum;

    public function mount()
    {
        $user = Auth::user();

        if ($user) {
            $this->countAdmin = User::where('role', 'admin')->count();
            $this->countGuru = User::where('role', 'guru')->count();
            $this->countSiswa = User::where('role', 'siswa')->count();
            $this->countKurikulum = User::where('role', 'kurikulum')->count();
        } else {
            $user = null;
        }
    }

    public function render()
    {
        return view('livewire.data-admin');
    }
}