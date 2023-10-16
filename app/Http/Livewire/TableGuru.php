<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_guru;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TableGuru extends Component
{
    public $search = '';
    public $pengampu;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->guru_id) {
            $guru_id = $user->guru_id;

            $jadwal = DB::table('data_pengampus')
                ->leftJoin('data_jadwals', 'data_pengampus.kode_pengampu', '=', 'data_jadwals.pengampu_id')
                ->leftJoin('data_gurus', 'data_pengampus.pengampu_id', '=', 'data_gurus.nip')
                ->where('data_pengampus.pengampu_id', '=', $user->guru_id)
                ->select(
                    'data_jadwals.*',
                    'data_pengampus.nama_guru',
                    'data_pengampus.nama_mapel'
                )
                ->where(function ($query) {
                    $query->where('data_jadwals.hari', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%')
                        ->orWhere('data_pengampus.nama_mapel', 'like', '%' . $this->search . '%');
                })
                ->paginate(10);               
        } else {
            $jadwal = null;
        }
        
        return view('livewire.table-guru', compact('jadwal'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.content_guru');
    }
}
