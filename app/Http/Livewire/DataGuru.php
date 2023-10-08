<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_guru;
use Livewire\WithPagination;

class DataGuru extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.data-guru', [
            'dagur' => data_guru::where('nama_guru', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}