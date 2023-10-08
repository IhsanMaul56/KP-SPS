<?php

namespace App\Http\Livewire;

use App\Models\data_siswa;
use Livewire\Component;
use Livewire\WithPagination;

class DataSiswa extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.data-siswa', [
            'dasis' => data_siswa::where('nama_siswa','like','%'.$this->search.'%')->paginate(5)
        ]);
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }
}
