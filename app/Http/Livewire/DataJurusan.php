<?php

namespace App\Http\Livewire;

use App\Models\data_jurusan;
use Livewire\Component;
use Livewire\WithPagination;

class DataJurusan extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.data-jurusan', [
            'dajur' => data_jurusan::where('nama_jurusan','like','%'.$this->search.'%')->paginate(5)
        ]);
    }
    public function updatingSearch(){
        $this->resetPage();
    }
}
