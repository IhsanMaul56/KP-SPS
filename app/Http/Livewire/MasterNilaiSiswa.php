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

            $tahunAkademik = DB::table('tahun_akademiks')
                ->select('kode_tahun', 'tahun_akademik')
                ->get();

            $this->akademikList = $tahunAkademik->pluck('tahun_akademik');

            if ($this->siswa) {
                $kelasId = $this->siswa->pluck('kelas_id');
                $tingkatId = $this->siswa->pluck('tingkat_id');

                $dataNilai = DB::table('data_jadwals')
                    ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                    ->leftJoin('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                    ->leftJoin('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                    ->where('data_tingkats.kode_tingkat', '=', $tingkatId)
                    ->where('data_kelas.kode_kelas', '=', $kelasId)
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
        if ($user && $user->siswa_id) {
            $siswa = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->leftJoin('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
                ->leftJoin('data_tingkats', 'data_siswas.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                ->select(
                    'data_siswas.nama_siswa',
                    'data_siswas.nis',
                    'data_siswas.kelas_id',
                    'data_siswas.tingkat_id',
                    'data_kelas.nama_kelas',
                    'data_kelas.nama_tingkat',
                    'data_kelas.nama_tahun'
                )
                ->first();

            if ($siswa) {
                $kelasId = $siswa->kelas_id;
                $tingkatId = $siswa->tingkat_id;

                $dataNilai = DB::table('data_jadwals')
                    ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                    ->leftJoin('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                    ->leftJoin('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                    ->where('data_tingkats.kode_tingkat', $tingkatId)
                    ->where('data_kelas.kode_kelas', $kelasId)
                    ->select(
                        'data_jadwals.pengampu_id',
                        'data_pengampus.nama_mapel'
                    )
                    ->distinct()
                    ->paginate(3);

                return view('livewire.nilai-progress', compact('dataNilai', 'siswa'));
            } else {
                session()->flash('gagal', 'Siswa tidak ditemukan.');
            }
        }
    }
}
