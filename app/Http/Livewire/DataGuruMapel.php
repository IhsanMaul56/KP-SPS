<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DataGuruMapel extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $pengampu = DB::table('data_pengampus')
            ->leftJoin('data_gurus', 'data_pengampus.pengampu_id', '=', 'data_gurus.nip')
            ->select(
                'data_pengampus.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->where(function ($query) {
                $query->where('data_pengampus.pengampu_id', 'like', '%' . $this->search . '%')
                    ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.data-guru-mapel', compact('pengampu'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.mapel-guru');
    }
}
