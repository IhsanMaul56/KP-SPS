<?php

namespace Database\Seeders;

use App\Models\data_kajur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataKajurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKajur = [
            [
                'guru_id' => '6900',
                'nama_guru' => 'DENIS AJI MUHAMAD JABAR, S.Kom.'
            ],
            [
                'guru_id' => '1300',
                'nama_guru' => 'ENUNG SARIFAH, S.Pd'
            ],
            [
                'guru_id' => '2100',
                'nama_guru' => 'AGUS HERYANA,S.Pd.,Gr'
            ],
            [
                'guru_id' => '4000',
                'nama_guru' => 'ENDRIYANTO TRILAKSONO, S.Pd'
            ]
        ];

        foreach ($dataKajur as $key => $val){
            data_kajur::create($val);
        }
    }
}
