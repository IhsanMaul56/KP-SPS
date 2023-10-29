<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class TabelSiswa extends Component
{
    public $kelas;
    public $siswa;
    public $tingkat;
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();
        
        if ($user && $user->siswa_id) {
            $this->siswa = DB::table('data_siswas')
                ->where('nis', '=', $user->siswa_id)
                ->select('data_siswas.*')
                ->get();
    
            if ($this->siswa) {
                $tingkatId = $this->siswa->pluck('tingkat_id')->toArray();
                $kelasId = $this->siswa->pluck('kelas_id')->toArray();
    
                $this->tingkat = DB::table('data_tingkats')
                    ->where('kode_tingkat', '=', $tingkatId)
                    ->value('nama_tingkat');
    
                $this->kelas = DB::table('data_kelas')
                    ->where('kode_kelas', '=', $kelasId)
                    ->value('nama_kelas');
    
                if ($kelasId && $this->kelas && $this->tingkat) {
                    $jadwal = DB::table('data_jadwals')
                        ->select(
                            'data_jadwals.*',
                            'data_pengampus.nama_guru',
                            'data_pengampus.nama_mapel'
                        )
                        ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                        ->where('data_jadwals.kelas_id', '=', $kelasId)
                        ->where('data_jadwals.tingkat_id', '=', $tingkatId)
                        ->where(function ($query) {
                            $query->where('data_jadwals.hari', 'like', '%' . $this->search . '%')
                                ->orWhere('data_pengampus.nama_guru', 'like', '%' . $this->search . '%')
                                ->orWhere('data_pengampus.nama_mapel', 'like', '%' . $this->search . '%');
                        })
                        ->paginate(10);
                }
            }
        } else {
            $this->kelas = null;
        }

        return view('livewire.tabel-siswa', compact('jadwal'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.content_siswa');
    }
}
