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
                'kajur_id' => '1',
                'nama_guru' => 'Nasrullah Nurul R, S.Pd., M.Pd.'
            ],
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'kajur_id' => '2',
                'nama_guru' => 'Dr. Samsori, S.Pd., M.Pd'
            ],
            [
                'nama_jurusan' => 'Bisnis Daring dan Pemasaran',
                'kajur_id' => '3',
                'nama_guru' => 'Lukman S.Pd'

            ],
            [
                'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
                'kajur_id' => '3',
                'nama_guru' => 'farhan S.Pd'
            ]
        ];

        foreach ($dataJurusan as $key => $val){
            data_jurusan::create($val);
        }
    }
}
