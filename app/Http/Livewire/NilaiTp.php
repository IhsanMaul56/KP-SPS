<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NilaiTp extends Component
{
    public function render()
    {
        return view('livewire.nilai-tp');
    }

    public function tampil()
    {
        return view('livewire.lihat-tp');
    }
}
