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
                'nama_kelas' => 'X OTKP 1',
                'jurusan_id' => '1',
                'nama_jurusan' => 'Otomasisasi dan Tatakelola Perkantoran'
            ],
            [
                'nama_kelas' => 'X RPL 1',
                'jurusan_id' => '2',
                'nama_jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_kelas' => 'X BDP 1',
                'jurusan_id' => '3',
                'nama_jurusan' => 'Bisnis Daring dan Pemasaran'
            ],
            [
                'nama_kelas' => 'X AKL 1',
                'jurusan_id' => '4',
                'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga'
            ],
        ];

        foreach ($dataKelas as $key => $val){
            data_kelas::create($val);
        }
    }
}
