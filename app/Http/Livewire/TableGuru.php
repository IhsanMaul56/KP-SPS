<?php

namespace App\Http\Livewire;

use App\Models\data_guru;
use Livewire\Component;
use Livewire\WithPagination;

class TableGuru extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.table-guru', [
            'dagur' => data_guru::where('nama_guru','like','%'.$this->search.'%')->paginate(5)
        ]);
    }
    public function updatingSearch(){
        $this->resetPage();
    }
}
