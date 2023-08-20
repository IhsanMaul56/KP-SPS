<?php

namespace Database\Seeders;

use App\Models\data_jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJurusan = [
            [
                'nama_jurusan' => 'Otomatisasi dan Tata Kelola Perkantosan',
                'nip' => '11111',
                'nama_kepala_jurusan' => 'Agung'
            ],
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'nip' => '22222',
                'nama_kepala_jurusan' => 'Budi'
            ],
            [
                'nama_jurusan' => 'Bisnis Daring dan Pemasaran',
                'nip' => '33333',
                'nama_kepala_jurusan' => 'Cindy'
            ],
            [
                'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
                'nip' => '44444',
                'nama_kepala_jurusan' => 'Dodi'
            ]
        ];

        foreach ($dataJurusan as $key => $val){
            data_jurusan::create($val);
        }
    }
}
