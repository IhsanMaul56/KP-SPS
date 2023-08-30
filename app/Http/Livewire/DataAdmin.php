<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_admin; // Ganti dengan model yang sesuai

class DataAdmin extends Component
{
    public $dataCount;

    public function mount()
    {
        $this->dataCount = data_admin::count(); // Menghitung jumlah data
    }

    public function render()
    {
        return view('livewire.data-admin');
    }
}
