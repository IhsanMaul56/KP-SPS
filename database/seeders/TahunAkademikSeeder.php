<?php

namespace Database\Seeders;

use App\Models\tahun_akademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunAkademik = [
            [
                'tahun_akademik' => '2023/2024'
            ]
        ];

        foreach($tahunAkademik as $key => $val){
            tahun_akademik::create($val);
        }
    }
}
