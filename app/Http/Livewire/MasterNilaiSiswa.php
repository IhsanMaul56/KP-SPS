<?php

namespace App\Http\Livewire;

use App\Models\BobotNilai;
use App\Models\PredikatNilai;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MasterNilaiSiswa extends Component
{
    public $tahunAkademik;
    public $semester;
    public $siswa = [];
    public $dataMapel = [];
    public $pdf;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->getNilai();

        return view('livewire.master-nilai-siswa');
    }

    public function getNilai()
    {
        $user = Auth::user();

        if ($user && $user->siswa_id) {
            //Menampilkan data siswa pada card pertama
            $this->siswa = DB::table('data_siswas')
                ->where('nis', $user->siswa_id)
                ->leftJoin('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
                ->leftJoin('tahun_akademiks', 'data_kelas.tahun_id', '=', 'tahun_akademiks.kode_tahun')
                ->leftJoin('data_semesters', 'tahun_akademiks.semester_id', '=', 'data_semesters.kode_semester')
                ->leftJoin('data_tingkats', 'data_siswas.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                ->select(
                    'data_siswas.nama_siswa',
                    'data_siswas.nis',
                    'data_siswas.kelas_id',
                    'data_siswas.tingkat_id',
                    'data_kelas.nama_kelas',
                    'data_kelas.nama_tingkat',
                    'tahun_akademiks.tahun_akademik',
                    'data_semesters.nama_semester',
                )
                ->get();

            $kelasId = $this->siswa->pluck('kelas_id')->toArray();
            $tingkatId = $this->siswa->pluck('tingkat_id')->toArray();

            //mengambil data untuk table
            $this->dataMapel = DB::table('data_jadwals')
                ->leftJoin('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                ->leftJoin('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                ->leftJoin('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                ->leftJoin('tahun_akademiks', 'data_kelas.tahun_id', '=', 'tahun_akademiks.kode_tahun')
                ->leftJoin('data_semesters', 'tahun_akademiks.semester_id', '=', 'data_semesters.kode_semester')
                ->where('data_tingkats.kode_tingkat', '=', $tingkatId)
                ->where('data_kelas.kode_kelas', '=', $kelasId)
                ->select(
                    'data_pengampus.*',
                    'data_tingkats.kode_tingkat',
                    'data_kelas.kode_kelas',
                    'tahun_akademiks.kode_tahun',
                    'data_semesters.kode_semester',
                )
                ->distinct()
                ->get();

            $mapelIds = $this->dataMapel->pluck('mapel_id');
            $pengampuIds = $this->dataMapel->pluck('kode_pengampu');
            $tahunId = $this->dataMapel->pluck('kode_tahun')->toArray();
            $semesterId = $this->dataMapel->pluck('kode_semester')->toArray();

            //mendapatkan nilai formatif
            $nilaiFormatifs = DB::table('nilai_formatifs')
                ->whereIn('mapel_id', $mapelIds)
                ->whereIn('tahun_id', $tahunId)
                ->whereIn('semester_id', $semesterId)
                ->where('siswa_id', $user->siswa_id)
                ->get();

            //mendapatkan nilai sumatif
            $nilaiSumatifs = DB::table('nilai_sumatifs')
                ->whereIn('mapel_id', $mapelIds)
                ->whereIn('tahun_id', $tahunId)
                ->whereIn('semester_id', $semesterId)
                ->where('siswa_id', $user->siswa_id)
                ->get();

            //mendapatkan bobot nilai
            $bobotNilai = DB::table('bobot_nilais')
                ->whereIn('pengampu_id', $pengampuIds)
                ->get();

            foreach ($this->dataMapel as $mapel) {
                $mapel->formatifs = $nilaiFormatifs->where('mapel_id', $mapel->mapel_id)->first();
                $mapel->sumatifs = $nilaiSumatifs->where('mapel_id', $mapel->mapel_id)->first();
                $mapel->bobotNilai = $bobotNilai->where('pengampu_id', $mapel->kode_pengampu)->first();

                //perhitungan nilai formatif, uts dan uas
                $nilaiTugasKuis = $mapel->formatifs ? ((($mapel->formatifs->tugas + $mapel->formatifs->kuis) / 2)) : 0;
                $nilaiUTS = $mapel->sumatifs ? $mapel->sumatifs->uts : 0;
                $nilaiUAS = $mapel->sumatifs ? $mapel->sumatifs->uas : 0;

                //menghitung nilai berdasarkan bobot
                $bobotFormatif = $mapel->bobotNilai ? ($mapel->bobotNilai->formatif_akhir / 100) : 0;
                $bobotUts = $mapel->bobotNilai ? ($mapel->bobotNilai->sumatif_uts / 100) : 0;
                $bobotUas = $mapel->bobotNilai ? ($mapel->bobotNilai->sumatif_uas / 100) : 0;

                //menghitung nilai akhir berdasarkan bobot
                $nilaiAkhir = ($nilaiTugasKuis * $bobotFormatif) + ($nilaiUTS * $bobotUts) + ($nilaiUAS * $bobotUas);

                $mapel->nilai_akhir = $nilaiAkhir;
                $mapel->huruf_nilai = $this->getHurufNilai($nilaiAkhir, $mapel->kode_pengampu);
            }
        }
    }

    public function getHurufNilai($nilaiAkhir, $pengampuIds)
    {
        $predikatNilais = DB::table('predikat_nilais')
            ->select('predikat_nilais.*')
            ->where('predikat_nilais.pengampu_id', $pengampuIds)
            ->get();

        if (!$predikatNilais) {
            return '-';
        }

        foreach ($predikatNilais as $predikatNilai) {
            $predikatA = $predikatNilai->nilai_a;
            $predikatB = $predikatNilai->nilai_b;
            $predikatC = $predikatNilai->nilai_c;
            $predikatD = $predikatNilai->nilai_d;
    
            if ($nilaiAkhir <= 0) {
                return '-';
            } elseif ($nilaiAkhir >= 1 && $nilaiAkhir < $predikatD) {
                return 'E';
            } elseif ($nilaiAkhir >= $predikatD && $nilaiAkhir < $predikatC ) {
                return 'D';
            } elseif ($nilaiAkhir >= $predikatC && $nilaiAkhir < $predikatB) {
                return 'C';
            } elseif ($nilaiAkhir >= $predikatB && $nilaiAkhir < $predikatA) {
                return 'B';
            } elseif ($nilaiAkhir >= $predikatA) {
                return 'A';
            } else {
                return 'Invalid';
            }
        }
    }

    public function NilaiProgress()
    {
        $this->getNilai();

        $siswa = $this->siswa;
        $dataMapel = $this->dataMapel;

        return view('livewire.nilai-progress', compact('siswa', 'dataMapel'));
    }

    public function NilaiPrint()
    {
        $this->getNilai();

        $siswa = $this->siswa;
        $dataMapel = $this->dataMapel;

        return view('livewire.nilai-cetak', compact('siswa', 'dataMapel'));
    }
}
