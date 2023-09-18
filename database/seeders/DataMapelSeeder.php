<?php

namespace Database\Seeders;

use App\Models\data_mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMapel = [
            [
                'nama_mapel' => 'SEJARAH',
            ],
            [
                'nama_mapel' => 'INFORMATIKA',
            ],
            [
                'nama_mapel' => 'BAHASA INGGRIS',
            ],
            [
                'nama_mapel' => 'PPKN',
            ],
            [
                'nama_mapel' => 'BABP ISLAM',
            ],
            [
                'nama_mapel' => 'DASAR-DASAR MANAJEMEN PERKANTORAN DAN LAYANAN BISNIS',
            ],
            [
                'nama_mapel' => 'PJOK',
            ],
            [
                'nama_mapel' => 'DASAR-DASAR PEMASARAN',
            ],
            [
                'nama_mapel' => 'MATEMATIKA',
            ],
            [
                'nama_mapel' => 'SENI BUDAYA',
            ],
            [
                'nama_mapel' => 'PROJEK ILMU PENGETAHUAN ALAM DAN SOSIAL',
            ],
            [
                'nama_mapel' => 'BAHASA SUNDA',
            ],
            [
                'nama_mapel' => 'BIMBINGAN KONSELING',
            ],
            [
                'nama_mapel' => 'DASAR-DASAR AKUNTANSI DAN KEUANGAN LEMBAGA',
            ],
            [
                'nama_mapel' => 'DASAR-DASAR PENGEMBANGAN PERANGKAT LUNAK DAN GIM',
            ],
            [
                'nama_mapel' => 'DASAR-DASAR PENGEMBANGAN PERANGKAT LUNAK',
            ],
            [
                'nama_mapel' => 'BAHASA INDONESIA',
            ],
        ];

        foreach ($dataMapel as $key => $val){
            data_mapel::create($val);
        }
    }
}
