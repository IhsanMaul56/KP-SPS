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
    public $dataCount;
    public $jadwal;
    public $pengampu;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();

        if ($user && $user->guru_id) {
            $this->pengampu = DB::table('data_pengampus')
                ->where('pengampu_id', '=', $user->guru_id)
                ->select('data_pengampus.*')
                ->get();
        
            if ($this->pengampu->isNotEmpty()) { // Periksa apakah ada data pengampu
                $kodePengampu = $this->pengampu->pluck('kode_pengampu')->toArray();

                $this->jadwal = DB::table('data_jadwals')
                    ->whereIn('pengampu_id', $kodePengampu)
                    ->select('data_jadwals.*')
                    ->get();
                
            } else {
                // Jika tidak ada pengampu yang sesuai, atur $this->jadwal menjadi null
                $this->jadwal = null;
            }
        } else {
            // Jika tidak ada user atau guru_id, atur $this->pengampu dan $this->jadwal menjadi null
            $this->pengampu = null;
            $this->jadwal = null;
        }
        
        return view('livewire.table-guru', [
            'dagur' => data_guru::where('nama_guru','like','%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

}
