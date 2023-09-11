<?php

namespace App\Http\Livewire;

use App\Models\data_jurusan;
use App\Models\data_kelas;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DataKurikulum extends Component
{
    public $countKelas;
    public $countJurusan;
    public $countGuru;
    public $countSiswa;

    public function mount()
    {
        $user = Auth::user();

        if ($user) {
            $this->countGuru = User::where('role', 'guru')->count();
            $this->countSiswa = User::where('role', 'siswa')->count();
            $this->countJurusan = data_jurusan::count();
            $this->countKelas = data_kelas::count();
        } else {
            $user = null;
        }
    }

    public function render()
    {
        return view('livewire.data-kurikulum');
    }
}