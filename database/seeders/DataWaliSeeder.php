<?php

namespace Database\Seeders;

use App\Models\data_wali;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataWaliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataWali = [
            [
                'wali_id' => '1000',
                'nama_guru' => 'Nasrullah Nurul R, S.Pd., M.Pd.',
                'kelas_id' => '1',
                'nama_kelas' => 'X OTKP 1'
            ],
            [
                'wali_id' => '3000',
                'nama_guru' => 'Lukman S.Pd',
                'kelas_id' => '2',
                'nama_kelas' => 'X RPL 1'
            ],
            [
                'wali_id' => '5000',
                'nama_guru' => 'Diyah S.Pd',
                'kelas_id' => '3',
                'nama_kelas' => 'X BDP 1'
            ],
            [
                'wali_id' => '7000',
                'nama_guru' => 'Alya S.Pd',
                'kelas_id' => '4',
                'nama_kelas' => 'X AKL 1'
            ]
        ];

        foreach($dataWali as $key => $val){
            data_wali::create($val);
        }
    }
}
