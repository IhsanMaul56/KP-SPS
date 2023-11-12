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
                'tahun_akademik' => '2023/2024',
                'semester_id' => '1',
                'nama_semester' => '1',
                'status' => 'aktif'
            ],
            [
                'tahun_akademik' => '2023/2024',
                'semester_id' => '2',
                'nama_semester' => '2',
                'status' => 'aktif'
            ],
            [
                'tahun_akademik' => '2024/2025',
                'semester_id' => '1',
                'nama_semester' => '1',
                'status' => 'tidak aktif'
            ],
            [
                'tahun_akademik' => '2024/2025',
                'semester_id' => '2',
                'nama_semester' => '2',
                'status' => 'tidak aktif'
            ],
        ];

        foreach($tahunAkademik as $key => $val){
            tahun_akademik::create($val);
        }
    }
}
