<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataNilaiSiswa extends Component
{
    public $siswa;

    public function render()
    {
        return view('livewire.data-nilai-siswa');
    }
}
