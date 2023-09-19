<?php

namespace Database\Seeders;

use App\Models\data_elemen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataElemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataElemen = [
            [
                'nama_elemen' => 'Elemen 1',
                'mapel_id' => '1',
                'nama_mapel' => 'Akuntansi Keuangan',
            ],
            [
                'nama_elemen' => 'Elemen 2',
                'mapel_id' => '1',
                'nama_mapel' => 'Akuntansi Keuangan',
            ],
            [
                'nama_elemen' => 'Elemen 1',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris',
            ],
            [
                'nama_elemen' => 'Elemen 1',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris',
            ],
        ];

        foreach($dataElemen as $key => $val){
            data_elemen::create($val);
        }
    }
}
