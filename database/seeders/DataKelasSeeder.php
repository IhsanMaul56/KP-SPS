<?php

namespace Database\Seeders;

use App\Models\data_kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKelas = [
            [
                'nama_kelas' => 'X OTKP 1',
                'nip' => '11111',
                'nama_wali' => 'Guru OTKP 1'
            ],
            [
                'nama_kelas' => 'XI OTKP 1',
                'nip' => '22222',
                'nama_wali' => 'Guru OTKP 2'
            ],
            [
                'nama_kelas' => 'XII OTKP 1',
                'nip' => '33333',
                'nama_wali' => 'Guru OTKP 3'
            ],
            [
                'nama_kelas' => 'X RPL 1',
                'nip' => '44444',
                'nama_wali' => 'Guru RPL 1'
            ],
            [
                'nama_kelas' => 'XI RPL 1',
                'nip' => '55555',
                'nama_wali' => 'Guru RPL 2'
            ],
            [
                'nama_kelas' => 'XII RPL 1',
                'nip' => '66666',
                'nama_wali' => 'Guru RPL 3'
            ],
            [
                'nama_kelas' => 'X BDP 1',
                'nip' => '77777',
                'nama_wali' => 'Guru BDP 1'
            ],
            [
                'nama_kelas' => 'XI BDP 1',
                'nip' => '88888',
                'nama_wali' => 'Guru BDP 2'
            ],
            [
                'nama_kelas' => 'XII BDP 1',
                'nip' => '99999',
                'nama_wali' => 'Guru BDP 3'
            ],
            [
                'nama_kelas' => 'X AKL 1',
                'nip' => '10101',
                'nama_wali' => 'Guru AKL 1'
            ],
            [
                'nama_kelas' => 'XI AKL 1',
                'nip' => '20202',
                'nama_wali' => 'Guru AKL 2'
            ],
            [
                'nama_kelas' => 'XII AKL 1',
                'nip' => '30303',
                'nama_wali' => 'Guru AKL 3'
            ],
        ];

        foreach ($dataKelas as $key => $val){
            data_kelas::create($val);
        }
    }
}
