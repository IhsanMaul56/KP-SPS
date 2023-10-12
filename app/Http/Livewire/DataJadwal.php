<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\data_jadwal;
use App\Models\data_pengampu;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DataJadwal extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->admin_id) {
            $jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
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

        } elseif ($user && $user->guru_id) {
            $jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
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

        return view('livewire.data-jadwal', compact('jadwal'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.jadwal-mapel');
    }
}