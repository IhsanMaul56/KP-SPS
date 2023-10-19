<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NilaiAtp extends Component
{
    public function render()
    {
        return view('livewire.nilai-atp');
    }

    public function tampil()
    {
        return view('livewire.lihat-atp');
    }
}
