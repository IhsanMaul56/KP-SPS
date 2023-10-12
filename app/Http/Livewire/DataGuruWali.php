<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataGuruWali extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $wali = DB::table('data_walis')
            ->leftJoin('data_gurus', 'data_walis.wali_id', '=', 'data_gurus.nip')
            ->select(
                'data_walis.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->where(function ($query) {
                $query->where('data_walis.wali_id', 'like', '%' . $this->search . '%')
                      ->orWhere('data_walis.nama_guru', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.data-guru-wali', compact('wali'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function tampil()
    {
        return view('partials.kurikulum-wali');
    }
}
