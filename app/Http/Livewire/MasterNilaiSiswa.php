<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MasterNilaiSiswa extends Component
{
    public $siswa;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();

        if($user && $user->siswa_id){
            $this->siswa = DB::table('data_siswas')
                ->where('nis', '=', $user->siswa_id)
                ->select('data_siswas.*')
                ->get();
            
            if($this->siswa){
                $kelasId = $this->siswa->pluck('kelas_id');
                $tingkatId = $this->siswa->pluck('tingkat_id');

                $dataNilai = DB::table('data_jadwals')
                    ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                    ->where('tingkat_id', '=', $kelasId)
                    ->where('kelas_id', '=', $tingkatId)
                    ->select(
                        'data_jadwals.pengampu_id',
                        'data_pengampus.nama_mapel'
                    )
                    ->distinct()
                    ->get();
            }
        }
        return view('livewire.master-nilai-siswa', compact('dataNilai'));
    }

    public function NilaiProgress()
    {
        $user = Auth::user();

        if($user && $user->siswa_id){
            $this->siswa = DB::table('data_siswas')
                ->where('nis', '=', $user->siswa_id)
                ->select('data_siswas.*')
                ->get();
            
            if($this->siswa){
                $kelasId = $this->siswa->pluck('kelas_id');
                $tingkatId = $this->siswa->pluck('tingkat_id');

                $dataNilai = DB::table('data_jadwals')
                    ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                    ->where('tingkat_id', '=', $kelasId)
                    ->where('kelas_id', '=', $tingkatId)
                    ->select(
                        'data_jadwals.pengampu_id',
                        'data_pengampus.nama_mapel'
                    )
                    ->distinct()
                    ->paginate(3);
            }
        }

        return view('livewire.nilai-progress', compact('dataNilai'));
    }
}
