<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DataGuruMapel extends Component
{
    public function render()
    {
        return view('livewire.data-guru-mapel');
    }

    public function tampil(){
        return view('partials.mapel-guru');
    }
}
