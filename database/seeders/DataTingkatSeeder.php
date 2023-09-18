<?php

namespace Database\Seeders;

use App\Models\data_tingkat;
use Illuminate\Database\Seeder;

class DataTingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataTingkat = [
            [
                'nama_tingkat' => 'X'
            ],
            [
                'nama_tingkat' => 'XI'
            ],
            [
                'nama_tingkat' => 'XII'
            ],
        ];

        foreach($dataTingkat as $key => $val){
            data_tingkat::create($val);
        }
    }
}
