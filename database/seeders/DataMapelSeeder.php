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
                'nama_mapel' => 'Akuntansi Keuangan'
            ],
            [
                'nama_mapel' => 'Bahasa Inggris',
            ],
            [
                'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
            ],
            [
                'nama_mapel' => 'Praktikum Akuntansi Perusahaan Jasa/Dagang/Manufaktur',
            ],
            [
                'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti',
            ],
            [
                'nama_mapel' => 'Otomatisasi Tata Kelola Humas dan Keprotokolan',
            ],
            [
                'nama_mapel' => 'Produk Kreatif dan Kewirausahaan',
            ],
            [
                'nama_mapel' => 'Bahasa Indonesia',
            ],
            [
                'nama_mapel' => 'Praktikum Akuntansi Lembaga/Instansi Pemerintah',
            ],
        ];

        foreach ($dataMapel as $key => $val){
            data_mapel::create($val);
        }
    }
}
