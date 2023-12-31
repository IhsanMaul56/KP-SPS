<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AturPeriode extends Component
{
    public function render()
    {
        return view('livewire.atur-periode');
    }

    public function tampil()
    {
        return view('partials.pengaturan-periode');
    }
}
