<?php

namespace App\Http\Livewire;

use App\Models\data_guru;
use Livewire\Component;

class DataTablesExample extends Component
{
    public $data;

    public function mount()
    {
        // Contoh pengambilan data dari database
        $this->data = data_guru::all(); // Ganti YourModel dengan model Anda
    }

    public function render()
    {
        return view('layouts.dashboard');
    }
}
