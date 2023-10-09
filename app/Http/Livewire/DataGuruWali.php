<?php

namespace App\Http\Livewire;

use App\Models\data_wali;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataGuruWali extends Component
{
    public $wali;
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->wali = DB::table('data_walis')
            ->leftJoin('data_gurus', 'data_walis.wali_id', '=', 'data_gurus.nip')
            ->select(
                'data_walis.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->get();

        return view('livewire.data-guru-wali', [
            'dataWali' => data_wali::where('nama_guru','like','%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function tampil()
    {
        return view('partials.kurikulum-wali');
    }
}
