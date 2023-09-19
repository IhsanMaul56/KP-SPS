<?php

namespace Database\Seeders;

use App\Models\data_jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJurusan = [
            [
                'nama_jurusan' => 'Pengembangan Perangkat Lunak dan Game',
                'kajur_id' => '1',
                'nama_guru' => 'DENIS AJI MUHAMAD JABAR, S.Kom.'
            ],
            [
                'nama_jurusan' => 'Pemasaran',
                'kajur_id' => '2',
                'nama_guru' => 'ENUNG SARIFAH, S.Pd'
            ],
            [
                'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'kajur_id' => '3',
                'nama_guru' => 'AGUS HERYANA,S.Pd.,Gr'

            ],
            [
                'nama_jurusan' => 'Akutansi dan Keuangan Lembaga',
                'kajur_id' => '4',
                'nama_guru' => 'ENDRIYANTO TRILAKSONO, S.Pd'
            ]
        ];

        foreach ($dataJurusan as $key => $val){
            data_jurusan::create($val);
        }
    }
}
