<?php

namespace App\Imports;

use App\Models\data_kelas;
use App\Models\data_tingkat;
use App\Models\DataSemester;
use App\Models\data_pengampu;
use App\Models\nilai_sumatif;
use App\Models\nilai_formatif;
use App\Models\tahun_akademik;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        try {
            $mapel = data_pengampu::where('nama_mapel', $row['mapel'])->first();
            $mapel_id = $mapel ? $mapel->mapel_id : null;

            $kelas = data_kelas::where('nama_kelas', $row['kelas'])->first();
            $kelas_id = $kelas ? $kelas->kode_kelas : null;

            $tingkat = data_tingkat::where('nama_tingkat', $row['tingkat'])->first();
            $tingkat_id = $tingkat ? $tingkat->kode_tingkat : null;

            $tahun_akademik_aktif = tahun_akademik::where('status', '=', 'aktif')->first();

            if (!$tahun_akademik_aktif) {
                Session::flash('error', 'Tidak dapat menemukan tahun akademik aktif');
                return;
            }

            $semester_aktif = DataSemester::where('status', '=', 'aktif')->first();

            if (!$semester_aktif) {
                Session::flash('error', 'Tidak dapat menemukan semester aktif.');
                return;
            }

            $commonData = [
                'tahun_id' => $tahun_akademik_aktif->kode_tahun,
                'nama_tahun' => $tahun_akademik_aktif->tahun_akademik,
                'semester_id' => $semester_aktif->kode_semester,
                'nama_semester' => $semester_aktif->nama_semester,
                'siswa_id' => $row['nis'],
                'nama_siswa' => $row['nama'],
                'mapel_id' => $mapel_id,
                'nama_mapel' => $row['mapel'],
                'tingkat_id' => $tingkat_id,
                'nama_tingkat' => $row['tingkat'],
                'kelas_id' => $kelas_id,
                'nama_kelas' => $row['kelas'],
            ];

            if (!$this->isDataExists($commonData, nilai_formatif::class) && !$this->isDataExists($commonData, nilai_sumatif::class)) {
                if (isset($row['tugas']) && isset($row['kuis'])) {
                    $formatifData = array_merge($commonData, [
                        'tugas' => $row['tugas'],
                        'kuis' => $row['kuis'],
                    ]);

                    nilai_formatif::create($formatifData);
                    Session::flash('berhasil_import', 'Data nilai berhasil diimport.');
                } elseif (empty($row['tugas']) || empty($row['kuis'])) {
                    Session::flash('error', 'Data tidak boleh kosong');
                }

                if (isset($row['uts']) && isset($row['uas'])) {
                    $sumatifData = array_merge($commonData, [
                        'uts' => $row['uts'],
                        'uas' => $row['uas'],
                    ]);

                    nilai_sumatif::create($sumatifData);
                    Session::flash('berhasil_import', 'Data nilai berhasil diimport.');
                } elseif (empty($row['uts']) || empty($row['uas'])) {
                    empty($row['uts']) || empty($row['uas']);
                }

            } else {
                Session::flash('error', 'Data Excel gagal diimpor karena sudah ada.');
            }

        } catch (\Exception $e) {
            $errorMessage = 'Terjadi kesalahan data pada nis/nama siswa/tingkat/kelas/nama mata pelajaran. Silahkan masukan data nilai nya saja';
            Session::flash('error', $errorMessage);
        }

        return null;
    }

    private function isDataExists($data, $model)
    {
        try {
            return $model::where($data)->exists();
        } catch (\Exception $e) {
            Session::flash('error', 'Terjadi kesalahan data pada nis/nama siswa/tingkat/kelas/nama mata pelajaran. Silahkan masukan data nilai nya saja');
            return false;
        }
    }
}
