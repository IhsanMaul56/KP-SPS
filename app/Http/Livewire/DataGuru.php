<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\data_guru;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Session;

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

    public function deleteGuru($nip)
    {
        User::where('guru_id', $nip)->delete();
        data_guru::where('nip', $nip)->delete();

        $this->resetPage();

        Session::flash('berhasil', 'Data berhasil dihapus');
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.master-guru');
    }
}