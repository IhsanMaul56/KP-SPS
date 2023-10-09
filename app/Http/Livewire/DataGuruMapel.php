<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DataGuruMapel extends Component
{
    public $pengampu;

    public function render()
    {
        $this->pengampu = DB::table('data_pengampus')
            ->leftJoin('data_gurus', 'data_pengampus.pengampu_id', '=', 'data_gurus.nip')
            ->select(
                'data_pengampus.*',
                'data_gurus.no_hp AS guru_no_hp'
            )
            ->get();

        return view('livewire.data-guru-mapel');
    }

    public function tampil(){
        return view('partials.mapel-guru');
    }
}
