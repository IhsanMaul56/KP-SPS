<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MasterNilaiSiswa extends Component
{
    public $akademikList;
    public $kelasSiswa;
    public $siswa;
    public $tingkat;
    public $kelas;

    public function render()
    {
        $tahunAkademik = DB::table('tahun_akademiks')
            ->select('kode_tahun', 'tahun_akademik')
            ->get();

        $this->akademikList = $tahunAkademik->pluck('tahun_akademik');

        return view('livewire.master-nilai-siswa');
    }

    public function NilaiProgress()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            $siswa = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->leftJoin('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
                ->select('data_siswas.nama_siswa', 'data_siswas.nis', 'data_kelas.nama_kelas', 'data_kelas.nama_tingkat', 'data_kelas.nama_tahun')
                ->first();

            if ($siswa) {
                return view('livewire.nilai-progress')->with('siswa', $siswa);
            } else {
                session()->flash('gagal', 'Siswa tidak ditemukan.');
            }
        }
    }
}
