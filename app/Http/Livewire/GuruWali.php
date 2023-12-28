<?php

namespace App\Http\Livewire;

use App\Models\data_kelas;
use Livewire\Component;
use App\Models\data_siswa;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Models\tahun_akademik;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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
    public $siswaSelected = [];
    public $selectAll = false;

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

    public function naikKelas()
    {
        if (!empty($this->siswaSelected)) {
            $selectedNIS    = array_keys(array_filter($this->siswaSelected));
            $tahunAktif     = tahun_akademik::where(['status' => 'aktif'])->value('kode_tahun');
            $siswaData      = data_siswa::whereIn('nis', $selectedNIS)->get();

            try{
                foreach ($siswaData as $siswa) {
                    $siswa->update([
                        'tingkat_id'    => $siswa->tingkat_id + 1,
                        'tahun_id'      => $tahunAktif
                    ]);
    
                    $dataKelas = data_kelas::select('kode_kelas')->where([['nama_kelas', $siswa->kelas->nama_kelas], ['tingkat_id', $siswa->tingkat_id]])->first();
                    $siswa->update([
                        'kelas_id'    => $dataKelas->kode_kelas,
                    ]);
                }

                session()->flash('berhasil', 'Data Berhasil Diupdate.');
            } catch (\Exception $e) {
                session()->flash('gagal', 'Terjadi Kesalahan Saat Mengupdate Data' . $e->getMessage());
            }
        } else {
            session()->flash('gagal', 'Tidak ada untuk di update');
        }
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
            $this->siswaSelected = array_fill_keys(
                $this->dataSiswa->pluck('nis')->toArray(),
                true
            );
        } else {
            $this->siswaSelected = [];
        }
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function tampil(){
        return view('partials.wali-guru');
    }

}
