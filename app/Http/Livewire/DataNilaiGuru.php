<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BobotNilai;
use App\Exports\NilaiExport;
use App\Imports\NilaiImport;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DataNilaiGuru extends Component
{
    public $guru;
    public $jadwal;
    public $siswa;
    public $tingkat = [];
    public $kelas = [];
    public $mapelSelected = "";
    public $tingkatSelected = "";
    public $kelasSelected = "";
    public $nilaiAkhir;
    public $mapelList;
    public $pengampu_id, $formatif_akhir, $sumatif_uts, $sumatif_uas;
    public $mapelData;

    use WithFileUploads;
    public $file;

    public function render()
    {
        $this->cari();

        $user = Auth::user();

        if ($user && $user->guru_id) {
            $this->guru = DB::table('data_pengampus')
                ->where('pengampu_id', '=', $user->guru_id)
                ->select('data_pengampus.*')
                ->get();

            $this->mapelList = $this->guru->pluck('nama_mapel', 'kode_pengampu');

            if ($this->mapelSelected) {
                $pengampuId = $this->guru->pluck('kode_pengampu')->toArray();

                $this->jadwal = DB::table('data_jadwals')
                    ->whereIn('pengampu_id', $pengampuId)
                    ->select('tingkat_id', 'kelas_id', 'pengampu_id')
                    ->get();

                if ($this->jadwal) {
                    $tingkatData = DB::table('data_tingkats')
                        ->whereIn('kode_tingkat', $this->jadwal->pluck('tingkat_id')->toArray())
                        ->select('nama_tingkat')
                        ->get();

                    if ($tingkatData->count() > 0) {
                        $tingkat = $tingkatData->pluck('nama_tingkat')->toArray();
                        $this->tingkat = $tingkat;
                    } else {
                        $this->tingkat = [];
                    }

                    if ($this->tingkat && $this->tingkatSelected) {

                        $kelasData = DB::table('data_pengampus')
                            ->whereIn('kode_pengampu', $pengampuId)
                            ->where('nama_mapel', $this->mapelSelected)
                            ->join('data_jadwals', 'data_pengampus.kode_pengampu', '=', 'data_jadwals.pengampu_id')
                            ->join('data_kelas', 'data_jadwals.kelas_id', '=', 'data_kelas.kode_kelas')
                            ->join('data_tingkats', 'data_jadwals.tingkat_id', '=', 'data_tingkats.kode_tingkat')
                            ->where('data_tingkats.nama_tingkat', 'LIKE', '%' . $this->tingkatSelected . '%')
                            ->select('data_kelas.nama_kelas')
                            ->distinct()
                            ->get();

                        if ($kelasData->count() > 0) {
                            $kelas = $kelasData->pluck('nama_kelas')->toArray();
                            $this->kelas = $kelas;
                        } else {
                            $this->kelas = [];
                        }
                    } else {
                        $this->kelas = [];
                    }
                } else {
                    $this->tingkat = [];
                }
            }
        }

        return view('livewire.data-nilai-guru', [
            'mapelList' => $this->mapelList,
            'mapelData' => $this->mapelData,
        ]);
    }

    public function updatedMapelSelected()
    {
        // Set tingkat menjadi kosong ketika mata pelajaran diubah
        $this->tingkatSelected = null;
        // Reset pilihan kelas
        $this->kelasSelected = null;
    }

    public function updatedTingkatSelected()
    {
        // Set kelas menjadi kosong ketika tingkat diubah
        $this->kelasSelected = null;
    }

    public function downloadExcel()
    {
        $this->cari();

        $fileName = 'data-nilai.xlsx';

        return Excel::download(new NilaiExport($this->siswa), $fileName);
    }

    public function importExcel()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx, xls'
        ]);

        Excel::import(new NilaiImport, $this->file);
    }

    public function cari()
    {
        if ($this->mapelSelected && $this->kelasSelected && $this->tingkatSelected) {
            $user = Auth::user();
            $guruId = $user->guru_id;

            $mapelId = DB::table('data_pengampus')
                ->where('nama_mapel', $this->mapelSelected)
                ->value('mapel_id');

            $tingkatId = DB::table('data_tingkats')
                ->where('nama_tingkat', $this->tingkatSelected)
                ->value('kode_tingkat');

            $kelasId = DB::table('data_kelas')
                ->where('nama_kelas', $this->kelasSelected)
                ->value('kode_kelas');

            $tahun = DB::table('tahun_akademiks')
                ->where('status', 'aktif')
                ->value('kode_tahun');

            $semester = DB::table('data_semesters')
                ->where('status', 'aktif')
                ->value('kode_semester');

            $results = DB::table('data_siswas')
                ->join('data_jadwals', 'data_siswas.kelas_id', '=', 'data_jadwals.kelas_id')
                ->join('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
                ->join('data_mapels', 'data_pengampus.mapel_id', '=', 'data_mapels.kode_mapel')
                ->join('bobot_nilais', 'data_pengampus.kode_pengampu', '=', 'bobot_nilais.pengampu_id')
                ->leftJoin('nilai_formatifs', function ($join) use ($mapelId, $tingkatId, $kelasId, $tahun, $semester) {
                    $join->on('data_siswas.nis', '=', 'nilai_formatifs.siswa_id')
                        ->where('nilai_formatifs.mapel_id', '=', $mapelId)
                        ->where('nilai_formatifs.tingkat_id', '=', $tingkatId)
                        ->where('nilai_formatifs.kelas_id', '=', $kelasId)
                        ->where('nilai_formatifs.tahun_id', '=', $tahun)
                        ->where('nilai_formatifs.semester_id', '=', $semester);
                })
                ->leftJoin('nilai_sumatifs', function ($join) use ($mapelId, $tingkatId, $kelasId, $tahun, $semester) {
                    $join->on('data_siswas.nis', '=', 'nilai_sumatifs.siswa_id')
                        ->where('nilai_sumatifs.mapel_id', '=', $mapelId)
                        ->where('nilai_sumatifs.tingkat_id', '=', $tingkatId)
                        ->where('nilai_sumatifs.kelas_id', '=', $kelasId)
                        ->where('nilai_sumatifs.tahun_id', '=', $tahun)
                        ->where('nilai_sumatifs.semester_id', '=', $semester);
                })
                ->where('data_pengampus.nama_mapel', '=', $this->mapelSelected)
                ->where('data_jadwals.nama_tingkat', 'LIKE', '%' . $this->tingkatSelected . '%')
                ->where('data_jadwals.nama_kelas', 'LIKE', '%' . $this->kelasSelected . '%')
                ->whereIn('data_jadwals.pengampu_id', function ($query) use ($guruId) {
                    $query->select('kode_pengampu')
                        ->from('data_pengampus')
                        ->where('pengampu_id', $guruId);
                })
                ->select(
                    'data_siswas.*',
                    'data_pengampus.mapel_id',
                    'data_pengampus.nama_mapel',
                    'data_jadwals.nama_tingkat',
                    'data_jadwals.nama_kelas',
                    'nilai_formatifs.tugas',
                    'nilai_formatifs.kuis',
                    'nilai_sumatifs.uts',
                    'nilai_sumatifs.uas',
                    DB::raw('((COALESCE(nilai_formatifs.tugas, 0) + COALESCE(nilai_formatifs.kuis, 0)) / 2) * (COALESCE(bobot_nilais.formatif_akhir, 0) / 100) + COALESCE(nilai_sumatifs.uts, 0) * (COALESCE(bobot_nilais.sumatif_uts, 0) / 100) + COALESCE(nilai_sumatifs.uas, 0) * (COALESCE(bobot_nilais.sumatif_uas, 0) / 100) as nilai_akhir')
                )
                ->distinct()
                ->get();

            $this->siswa = collect($results);
        } else {
            $this->siswa = collect();
        }
    }

    public function fetchMapelData()
    {
        $mapelData = BobotNilai::where('pengampu_id', $this->pengampu_id)->first();

        if ($mapelData) {
            $this->formatif_akhir = $mapelData->formatif_akhir;
            $this->sumatif_uts = $mapelData->sumatif_uts;
            $this->sumatif_uas = $mapelData->sumatif_uas;
        } else {
            $this->formatif_akhir = null;
            $this->sumatif_uts = null;
            $this->sumatif_uas = null;
        }
    }

    public function insertBobot()
    {
        $this->validate([
            'pengampu_id' => 'required',
            'formatif_akhir' => 'required|numeric',
            'sumatif_uts' => 'required|numeric',
            'sumatif_uas' => 'required|numeric',
        ]);

        $totalPercentage = $this->formatif_akhir + $this->sumatif_uts + $this->sumatif_uas;

        if ($totalPercentage != 100) {
            $this->addError('formatif_akhir', 'Total persentase harus sama dengan 100.');
            $this->addError('sumatif_uts', 'Total persentase harus sama dengan 100.');
            $this->addError('sumatif_uas', 'Total persentase harus sama dengan 100.');
            session()->flash('gagal', 'Total persentase harus 100.');
            return;
        }

        try {
            $existingData = BobotNilai::where('pengampu_id', $this->pengampu_id)->first();

            if ($existingData) {
                // Update existing data
                $existingData->update([
                    'formatif_akhir' => $this->formatif_akhir,
                    'sumatif_uts' => $this->sumatif_uts,
                    'sumatif_uas' => $this->sumatif_uas,
                ]);
                session()->flash('berhasil', 'Data Berhasil Diperbarui');
            } else {
                BobotNilai::updateOrInsert([
                    'pengampu_id' => $this->pengampu_id,
                    'formatif_akhir' => $this->formatif_akhir,
                    'sumatif_uts' => $this->sumatif_uts,
                    'sumatif_uas' => $this->sumatif_uas,
                ]);
                session()->flash('berhasil', 'Data Berhasil Ditambahkan');
            }
        } catch (\Exception $e) {
            session()->flash('gagal', 'Terjadi Kesalahan Saat Menambahkan/Data: ' . $e->getMessage());
        }
    }

    public function tampil()
    {
        return view('partials.guru-nilai');
    }
}
