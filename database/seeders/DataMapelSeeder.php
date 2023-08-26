<?php

namespace Database\Seeders;

use App\Models\data_mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMapel = [
            [
                'nama_mapel' => 'Akuntansi Keuangan',
                'nip' => '0001',
            ],
            [
                'nama_mapel' => 'Bahasa Inggris',
                'nip' => '0002',
            ],
            [
                'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'nip' => '0003',
            ],
            [
                'nama_mapel' => 'Praktikum Akuntansi Perusahaan Jasa/Dagang/Manufaktur',
                'nip' => '0004',
            ],
            [
                'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti',
                'nip' => '0005',
            ],
            [
                'nama_mapel' => 'Otomatisasi Tata Kelola Humas dan Keprotokolan',
                'nip' => '0006',
            ],
            [
                'nama_mapel' => 'Produk Kreatif dan Kewirausahaan',
                'nip' => '0007',
            ],
            [
                'nama_mapel' => 'Bahasa Indonesia',
                'nip' => '0008',
            ],
            [
                'nama_mapel' => 'Bahasa Inggris',
                'nip' => '0009',
            ],
            [
                'nama_mapel' => 'Praktikum Akuntansi Lembaga/Instansi Pemerintah',
                'nip' => '0010',
            ],
        ];

        foreach ($dataMapel as $key => $val){
            data_mapel::create($val);
        }
    }
}
