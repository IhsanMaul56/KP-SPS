<?php

namespace Database\Seeders;

use App\Models\DataSemester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSemester = [
            [
                'nama_semester' => '1',
                'status' => 'aktif'
            ],
            [
                'nama_semester' => '2',
                'status' => 'tidak aktif'
            ],
        ];

        foreach($dataSemester as $key => $val){
            DataSemester::create($val);
        }
    }
}
