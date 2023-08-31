<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuruWali extends Component
{
    public $wali;
    public $kelas;
    public $dataSiswa;

    public function render()
    {
        $user = Auth::user();

        if($user && $user->guru_id){
            $this->wali = DB::table('data_walis')
                ->where('wali_id', '=', $user->guru_id)
                ->select('data_walis.*')
                ->get();
            
            if($this->wali){
                $kelasId = $this->wali->pluck('kelas_id')->toArray();

                $this->kelas = DB::table('data_kelas')
                    ->where('kode_kelas', '=', $kelasId)
                    ->value('nama_kelas');
                
                if($this->kelas){
                    // $siswaId = $this->kelas->pluck('kode_kelas')->toArray();

                    $this->dataSiswa = DB::table('data_siswas')
                        ->where('kelas_id', '=', $kelasId)
                        ->select('data_siswas.*')
                        ->get();
                } else {
                    $this->dataSiswa = null;
                    $this->wali = null;
                    $this->kelas = null;
                }
            } else {
                $this->wali = null;
                $this->kelas = null;
            }
        } else {
            $this->wali = null;
        }

        return view('livewire.guru-wali');
    }
}
