<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MasterNilaiSiswa extends Component
{
    public function render()
    {
        return view('livewire.master-nilai-siswa');
    }

    public function NilaiProgress()
    {
        return view('livewire.nilai-progress');
    }
}
