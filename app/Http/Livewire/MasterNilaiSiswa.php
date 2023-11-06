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

                $dataMapel = DB::table('data_jadwals')
                    ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                    ->leftJoin('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                    ->leftJoin('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                    ->leftJoin('nilai_formatifs', 'data_pengampus.mapel_id', '=', 'nilai_formatifs.mapel_id')
                    ->leftJoin('nilai_sumatifs', 'data_pengampus.mapel_id', '=', 'nilai_sumatifs.mapel_id')
                    ->where('data_tingkats.kode_tingkat', '=', $tingkatId)
                    ->where('data_kelas.kode_kelas', '=', $kelasId)
                    ->select(
                        'data_pengampus.*',
                        'data_tingkats.kode_tingkat',
                        'data_kelas.kode_kelas'
                    )
                    ->distinct()
                    ->get();

                $mapelIds = $dataMapel->pluck('mapel_id');

                $nilaiFormatifs = DB::table('nilai_formatifs')
                    ->whereIn('mapel_id', $mapelIds)
                    ->where('siswa_id', $user->siswa_id)
                    ->get();

                $nilaiSumatifs = DB::table('nilai_sumatifs')
                    ->whereIn('mapel_id', $mapelIds)
                    ->where('siswa_id', $user->siswa_id)
                    ->get();

                foreach ($dataMapel as $mapel) {
                    $mapel->formatifs = $nilaiFormatifs->where('mapel_id', $mapel->mapel_id)->first();
                    $mapel->sumatifs = $nilaiSumatifs->where('mapel_id', $mapel->mapel_id)->first();

                    $nilaiTugasKuis = $mapel->formatifs ? (($mapel->formatifs->tugas + $mapel->formatifs->kuis / 2)) : 0;
                    $nilaiUTS = $mapel->sumatifs ? $mapel->sumatifs->uts : 0;
                    $nilaiUAS = $mapel->sumatifs ? $mapel->sumatifs->uas : 0;

                    $nilaiAkhir = ($nilaiTugasKuis * 0.4) + ($nilaiUTS * 0.3) + ($nilaiUAS * 0.3);

                    $mapel->nilai_akhir = $nilaiAkhir;
                    $mapel->huruf_nilai = $this->getHurufNilai($nilaiAkhir);
                }
            }
        }

        return view('livewire.master-nilai-siswa', compact('dataMapel'));
    }

    public function getHurufNilai($nilaiAkhir)
    {
        if ($nilaiAkhir == 0) {
            return '-';
        } elseif ($nilaiAkhir >= 1 && $nilaiAkhir <= 40) {
            return 'D';
        } elseif ($nilaiAkhir >= 41 && $nilaiAkhir <= 70) {
            return 'C';
        } elseif ($nilaiAkhir >= 71 && $nilaiAkhir <= 85) {
            return 'B';
        } elseif ($nilaiAkhir >= 86 && $nilaiAkhir <= 100) {
            return 'A';
        } else {
            return 'Invalid';
        }
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

                $dataMapel = DB::table('data_jadwals')
                    ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                    ->leftJoin('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                    ->leftJoin('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                    ->where('data_tingkats.kode_tingkat', $tingkatId)
                    ->where('data_kelas.kode_kelas', $kelasId)
                    ->select(
                        'data_jadwals.pengampu_id',
                        'data_pengampus.*'
                    )
                    ->distinct()
                    ->get();

                $mapelIds = $dataMapel->pluck('mapel_id');

                $nilaiFormatifs = DB::table('nilai_formatifs')
                    ->whereIn('mapel_id', $mapelIds)
                    ->where('siswa_id', $user->siswa_id)
                    ->get();

                $nilaiSumatifs = DB::table('nilai_sumatifs')
                    ->whereIn('mapel_id', $mapelIds)
                    ->where('siswa_id', $user->siswa_id)
                    ->get();

                foreach ($dataMapel as $mapel) {
                    $mapel->formatifs = $nilaiFormatifs->where('mapel_id', $mapel->mapel_id)->first();
                    $mapel->sumatifs = $nilaiSumatifs->where('mapel_id', $mapel->mapel_id)->first();
                }

                return view('livewire.nilai-progress', compact('dataMapel', 'siswa'));
            } else {
                session()->flash('gagal', 'Siswa tidak ditemukan.');
            }
        }
    }
}
