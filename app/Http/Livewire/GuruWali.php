<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\data_siswa;

class GuruWali extends Component
{
    public $search = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $wali;
    public $kelas;
    public $tingkat;
    public $akademik;
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
                $tingkatId = $this->wali->pluck('tingkat_id')->toArray();

                $this->akademik = DB::table('tahun_akademiks')
                    ->select('tahun_akademiks.tahun_akademik')
                    ->get();

                $this->kelas = DB::table('data_kelas')
                    ->where('kode_kelas', '=', $kelasId)
                    ->value('nama_kelas');
                
                $this->tingkat = DB::table('data_tingkats')
                    ->where('kode_tingkat', '=', $tingkatId)
                    ->value('nama_tingkat');

                if($this->kelas){

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

        return view('livewire.guru-wali', [
            'dataSiswa' => data_siswa::where('nama_siswa','like','%'.$this->search.'%')->paginate(5)
        ]);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.wali-guru');
    }

}
