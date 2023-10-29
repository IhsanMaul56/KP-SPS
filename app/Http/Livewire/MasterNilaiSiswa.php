<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MasterNilaiSiswa extends Component
{
    public $akademikList;
    public $kelasSiswa;
    public $siswa;
    public $tingkat;
    public $kelas;
    public $siswa;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $user = Auth::user();
        $tahunAkademik = DB::table('tahun_akademiks')
            ->select('kode_tahun', 'tahun_akademik')
            ->get();

        $this->akademikList = $tahunAkademik->pluck('tahun_akademik');

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
            $siswa = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->leftJoin('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
                ->select('data_siswas.nama_siswa', 'data_siswas.nis', 'data_kelas.nama_kelas', 'data_kelas.nama_tingkat', 'data_kelas.nama_tahun')
                ->first();
          
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
              if ($siswa) {
                  return view('livewire.nilai-progress', compact('dataNilai'))->with('siswa', $siswa);
              } else {
                  session()->flash('gagal', 'Siswa tidak ditemukan.');
              }
            }
        }
    }
}
