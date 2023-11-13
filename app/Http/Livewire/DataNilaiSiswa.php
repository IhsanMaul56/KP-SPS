<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\nilai_sumatif;
use App\Models\nilai_formatif;
use Illuminate\Support\Facades\DB;

class DataNilaiSiswa extends Component
{
    public $siswaData;
    public $mapelData;
    public $kuis, $tugas, $uts, $uas;
    public $mapel_id;
    public $tingkat_id;
    public $kelas_id;
    public $siswa_id;

    public function render(Request $request)
    {
        //Mendapatkan nilai nis
        $nis = $request->nis;
        $this->siswaData = $nis;

        //mendapatkan nilai kode_mapel
        $mapel_id = $request->mapel_id;
        $this->mapelData = $mapel_id;

        $siswa = DB::table('data_siswas')
            ->join('data_kelas', 'data_siswas.kelas_id', '=', 'data_kelas.kode_kelas')
            ->join('data_tingkats', 'data_siswas.tingkat_id', '=', 'data_tingkats.kode_tingkat')
            ->join('data_jadwals', 'data_kelas.kode_kelas', '=', 'data_jadwals.kelas_id')
            ->join('data_pengampus', 'data_jadwals.pengampu_id', '=', 'data_pengampus.kode_pengampu')
            ->where('data_siswas.nis', '=', $this->siswaData)
            ->where('data_pengampus.mapel_id', '=', $this->mapelData)
            ->select(
                'data_siswas.nama_siswa',
                'data_siswas.nis',
                'data_siswas.kelas_id',
                'data_siswas.tingkat_id',
                'data_kelas.nama_kelas',
                'data_tingkats.nama_tingkat',
                'data_kelas.nama_tahun',
                'data_pengampus.nama_mapel',
                'data_pengampus.kode_pengampu',
                'data_pengampus.mapel_id',
            )
            ->first();

        $this->siswa_id = $siswa->nis;
        $this->mapel_id = $siswa->mapel_id;
        $this->kelas_id = $siswa->kelas_id;
        $this->tingkat_id = $siswa->tingkat_id;

        $nilaiFormatif = DB::table('nilai_formatifs')
            ->where('siswa_id', '=', $this->siswa_id)
            ->where('mapel_id', '=', $this->mapel_id)
            ->where('tingkat_id', '=', $this->tingkat_id)
            ->where('kelas_id', '=', $this->kelas_id)
            ->select('nilai_formatifs.*')
            ->first();

        $nilaiSumatif = DB::table('nilai_sumatifs')
            ->where('siswa_id', '=', $this->siswa_id)
            ->where('mapel_id', '=', $this->mapel_id)
            ->where('tingkat_id', '=', $this->tingkat_id)
            ->where('kelas_id', '=', $this->kelas_id)
            ->select('nilai_sumatifs.*')
            ->first();

        return view('livewire.data-nilai-siswa', compact('siswa', 'nilaiFormatif', 'nilaiSumatif'));
    }

    public function createNilaiFormatif(Request $request)
    {
        $mapel_id = $request->input('mapel_id');
        $kelas_id = $request->input('kelas_id');
        $tingkat_id = $request->input('tingkat_id');
        $siswa_id = $request->input('siswa_id');

        $request->validate([
            'kuis' => 'required|numeric',
            'tugas' => 'required|numeric',
        ]);

        try {
            $mapelData = DB::table('data_mapels')
                ->where('kode_mapel', $mapel_id)
                ->value('nama_mapel');

            $tingkatData = DB::table('data_tingkats')
                ->where('kode_tingkat', $tingkat_id)
                ->value('nama_tingkat');

            $kelasData = DB::table('data_kelas')
                ->where('kode_kelas', $kelas_id)
                ->value('nama_kelas');

            $siswaData = DB::table('data_siswas')
                ->where('nis', $siswa_id)
                ->value('nama_siswa');

            nilai_formatif::updateOrInsert(
                [
                    'mapel_id' => $mapel_id,
                    'tingkat_id' => $tingkat_id,
                    'kelas_id' => $kelas_id,
                    'siswa_id' => $siswa_id,
                ],
                [
                    'nama_mapel' => $mapelData,
                    'nama_tingkat' => $tingkatData,
                    'nama_kelas' => $kelasData,
                    'nama_siswa' => $siswaData,
                    'kuis' => $request->kuis,
                    'tugas' => $request->tugas,
                ]
            );

            $this->reset(['tugas', 'kuis']);

            session()->flash('berhasil_formatif', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            session()->flash('gagal_formatif', 'Terjadi kesalahan saat menyimpan data nilai: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function createNilaiSumatif(Request $request)
    {
        $mapel_id = $request->input('mapel_id');
        $kelas_id = $request->input('kelas_id');
        $tingkat_id = $request->input('tingkat_id');
        $siswa_id = $request->input('siswa_id');

        $request->validate([
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
        ]);

        try {
            $mapelData = DB::table('data_mapels')
                ->where('kode_mapel', $mapel_id)
                ->value('nama_mapel');

            $tingkatData = DB::table('data_tingkats')
                ->where('kode_tingkat', $tingkat_id)
                ->value('nama_tingkat');

            $kelasData = DB::table('data_kelas')
                ->where('kode_kelas', $kelas_id)
                ->value('nama_kelas');

            $siswaData = DB::table('data_siswas')
                ->where('nis', $siswa_id)
                ->value('nama_siswa');

            nilai_sumatif::updateOrInsert(
                [
                    'mapel_id' => $mapel_id,
                    'tingkat_id' => $tingkat_id,
                    'kelas_id' => $kelas_id,
                    'siswa_id' => $siswa_id,
                ],
                [
                    'nama_mapel' => $mapelData,
                    'nama_tingkat' => $tingkatData,
                    'nama_kelas' => $kelasData,
                    'nama_siswa' => $siswaData,
                    'uts' => $request->uts,
                    'uas' => $request->uas,
                ]
            );

            $this->reset(['uts', 'uas']);
            session()->flash('berhasil_sumatif', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            session()->flash('gagal_sumatif', 'Terjadi kesalahan saat menyimpan data nilai: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
