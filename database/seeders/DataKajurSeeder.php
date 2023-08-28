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
                'kajur_id' => '1000',
                'nama_guru' => 'Nasrullah Nurul R, S.Pd., M.Pd.'
            ],
            [
                'kajur_id' => '2000',
                'nama_guru' => 'Dr. Samsori, S.Pd., M.Pd'
            ],
            [
                'kajur_id' => '3000',
                'nama_guru' => 'Lukman S.Pd'
            ],
            [
                'kajur_id' => '4000',
                'nama_guru' => 'Farhan S.Pd'
            ]
        ];

        foreach ($dataKajur as $key => $val){
            data_kajur::create($val);
        }
    }
}
