<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DataGuruWali extends Component
{
    public function render()
    {
        return view('livewire.data-guru-wali');
    }
    
    public function tampil()
    {
        return view('partials.kurikulum-wali');
    }
}
