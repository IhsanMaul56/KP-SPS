<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AktivasiPenilaian extends Component
{
    // public function render()
    // {
    //     return view('livewire.aktivasi-penilaian');
    // }

    public function tampil(){
        return view('partials.content_penilaian');
    }
}
