<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_kelas;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class DataKelas extends Component
{
    public $kelas;
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->kelas = DB::table('data_walis')
            ->leftJoin('data_gurus', 'data_walis.wali_id', '=', 'data_gurus.nip')
            ->select(
                'data_walis.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->get();

        return view('livewire.data-kelas', [
            'dakel' => data_kelas::where('nama_jurusan','like','%'.$this->search.'%')->paginate(5)
        ]);
    }
    public function updatingSearch(){
        $this->resetPage();
    }
}
