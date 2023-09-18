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
                'wali_id' => '2000',
                'nama_guru' => 'ATIEK OCTARIA P. S.Pd',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '1',
                'nama_kelas' => 'PPLG 1'
            ],
            [
                'wali_id' => '6100',
                'nama_guru' => 'WIJAYA MUSTOPA, S.Ip',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '2',
                'nama_kelas' => 'PPLG 2'
            ],
            [
                'wali_id' => '5600',
                'nama_guru' => 'YUDI KURNIA SOLIHIN, S.Pd',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '3',
                'nama_kelas' => 'PPLG 3'
            ],
            [
                'wali_id' => '5800',
                'nama_guru' => 'RIFKI AHMAD, S.Pd.',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '4',
                'nama_kelas' => 'PM 1'
            ],
            [
                'wali_id' => '4900',
                'nama_guru' => 'PUTRI NURJANAH MUSLIMAH, S.Pd.,Gr',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '5',
                'nama_kelas' => 'PM 2'
            ],
            [
                'wali_id' => '6300',
                'nama_guru' => 'DIMAS YONATHAN, S.Pd.',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '6',
                'nama_kelas' => 'PM 3'
            ],
            [
                'wali_id' => '2300',
                'nama_guru' => 'JENNY NUR APRIYANTI, S.Pd.',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '7',
                'nama_kelas' => 'MPLB 1'
            ],
            [
                'wali_id' => '4800',
                'nama_guru' => 'FARIDA TYAS, S.Pd.',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '8',
                'nama_kelas' => 'MPLB 2'
            ],
            [
                'wali_id' => '2900',
                'nama_guru' => 'RAKAI META PUSPARINI, S.Pt',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '9',
                'nama_kelas' => 'MPLBB 3'
                
            ],
            [
                'wali_id' => '6300',
                'nama_guru' => 'MUHAMMAD AKBAR, S.Pd.',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '10',
                'nama_kelas' => 'AK 1'
            ],
            [
                'wali_id' => '3000',
                'nama_guru' => 'SRI UMI MARDIASIH, S.Pd, M.Pd',
                'tingkat_id' => '1',
                'nama_tingkat' => 'X',
                'kelas_id' => '11',
                'nama_kelas' => 'AK 2'
            ],
        ];

        foreach($dataWali as $key => $val){
            data_wali::create($val);
        }
    }
}
