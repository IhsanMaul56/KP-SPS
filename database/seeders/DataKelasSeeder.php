<?php

namespace Database\Seeders;

use App\Models\data_kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKelas = [
            [
                'nama_kelas' => 'PPLG 1',
                'jurusan_id' => '1',
                'nama_jurusan' => 'Pengembangan Perangkat Lunak dan Game',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'PPLG 2',
                'jurusan_id' => '1',
                'nama_jurusan' => 'Pengembangan Perangkat Lunak dan Game',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'PPLG 3',
                'jurusan_id' => '1',
                'nama_jurusan' => 'Pengembangan Perangkat Lunak dan Game',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'PM 1',
                'jurusan_id' => '2',
                'nama_jurusan' => 'pemasaran',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'PM 2',
                'jurusan_id' => '2',
                'nama_jurusan' => 'Pemasaran',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'PM 3',
                'jurusan_id' => '2',
                'nama_jurusan' => 'Pemasaran',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'MPLB 1',
                'jurusan_id' => '3',
                'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'MPLB 2',
                'jurusan_id' => '3',
                'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'MPLB 3',
                'jurusan_id' => '3',
                'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'AKL 1',
                'jurusan_id' => '4',
                'nama_jurusan' => 'Akutansi dan Keuangan Lembaga',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
            [
                'nama_kelas' => 'AKL 2',
                'jurusan_id' => '4',
                'nama_jurusan' => 'Akutansi dan Keuangan Lembaga',
                'tingkat_id' => '1',
                'nama_tingkat' => 'x',
                'tahun_id' => '1',
            ],
        ];

        foreach ($dataKelas as $key => $val){
            data_kelas::create($val);
        }
    }
}
