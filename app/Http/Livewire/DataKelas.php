<?php

namespace App\Http\Livewire;

use App\Models\data_kelas;
use Livewire\Component;
use Livewire\WithPagination;

class DataKelas extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.data-kelas', [
            'dakel' => data_kelas::where('nama_jurusan','like','%'.$this->search.'%')->paginate(5)
        ]);
    }
    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.kelas-data');
    }
}
