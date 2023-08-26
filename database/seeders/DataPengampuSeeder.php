<?php

namespace Database\Seeders;

use App\Models\data_pengampu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataPengampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPengampu = [
            [
                'pengampu_id' => '5000',
                'nama_guru' => 'Diyah S.Pd',
                'mapel_id' => '1',
                'nama_mapel' => 'Akuntansi Keuangan'
            ],
            [
                'pengampu_id' => '6000',
                'nama_guru' => 'Sopi S.Pd',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris'
            ],
            [
                'pengampu_id' => '7000',
                'nama_guru' => 'Alya S.Pd',
                'mapel_id' => '3',
                'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan'
            ],
        ];

        foreach($dataPengampu as $key => $val){
            data_pengampu::create($val);
        }
    }
}
