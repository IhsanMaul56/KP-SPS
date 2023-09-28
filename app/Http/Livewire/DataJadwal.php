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
    public $jadwal;
    public $pengampu;

    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->admin_id) {
            $this->jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->get();

            if ($this->jadwal) {
                $pengampuIds = $this->jadwal->pluck('pengampu_id')->toArray();

                // Fetch all matching data_pengampus records using whereIn
                $this->pengampu = DB::table('data_pengampus')
                    ->whereIn('kode_pengampu', $pengampuIds)
                    ->get();
            } else {
                $this->pengampu = null;
            }
        } elseif ($user && $user->guru_id) {
            $this->jadwal = DB::table('data_jadwals')
                ->select('data_jadwals.*')
                ->get();

            if ($this->jadwal) {
                $pengampuIds = $this->jadwal->pluck('pengampu_id')->toArray();

                // Fetch all matching data_pengampus records using whereIn
                $this->pengampu = DB::table('data_pengampus')
                    ->whereIn('kode_pengampu', $pengampuIds)
                    ->get();
            } else {
                $this->pengampu = null;
            }
        } else {
            $this->pengampu = null;
            $this->jadwal = null;
        }

        return view('livewire.data-jadwal', [
            'dataJadwal' => data_jadwal::where('hari', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
