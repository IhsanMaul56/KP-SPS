<?php

namespace Database\Seeders;

use App\Models\data_jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataJadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJadwal = [
            [
                'kelas_id' => '1',
                'nama_kelas' => 'X OTKP 1',
                'mapel_id' => '1',
                'nama_mapel' => 'Akuntansi Keuangan',
                'pengampu_id' => '1',
                'nama_pengampu' => 'Diyah S.Pd',
                'hari' => 'Senin',
                'waktu' => '08:00'
            ],
            [
                'kelas_id' => '1',
                'nama_kelas' => 'X OTKP 1',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris',
                'pengampu_id' => '2',
                'nama_pengampu' => 'Sopi S.Pd',
                'hari' => 'Senin',
                'waktu' => '10:00'
            ],
            [
                'kelas_id' => '2',
                'nama_kelas' => 'X RPL 1',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris',
                'pengampu_id' => '2',
                'nama_pengampu' => 'Sopi S.Pd',
                'hari' => 'Senin',
                'waktu' => '08:00'
            ],
            [
                'kelas_id' => '2',
                'nama_kelas' => 'X RPL 1',
                'mapel_id' => '3',
                'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'pengampu_id' => '3',
                'nama_pengampu' => 'Alya S.Pd',
                'hari' => 'Senin',
                'waktu' => '10:00'
            ],
            [
                'kelas_id' => '3',
                'nama_kelas' => 'X BDP 1',
                'mapel_id' => '3',
                'nama_mapel' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'pengampu_id' => '3',
                'nama_pengampu' => 'Alya S.Pd',
                'hari' => 'Selasa',
                'waktu' => '08:00'
            ],
            [
                'kelas_id' => '3',
                'nama_kelas' => 'X BDP 1',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris',
                'pengampu_id' => '2',
                'nama_pengampu' => 'Sopi S.Pd',
                'hari' => 'Selasa',
                'waktu' => '10:00'
            ],
            [
                'kelas_id' => '4',
                'nama_kelas' => 'X AKL 1',
                'mapel_id' => '2',
                'nama_mapel' => 'Bahasa Inggris',
                'pengampu_id' => '2',
                'nama_pengampu' => 'Sopi S.Pd',
                'hari' => 'Selasa',
                'waktu' => '08:00'
            ],
            [
                'kelas_id' => '4',
                'nama_kelas' => 'X AKL 1',
                'mapel_id' => '1',
                'nama_mapel' => 'Akuntansi Keuangan',
                'pengampu_id' => '1',
                'nama_pengampu' => 'Diyah S.Pd',
                'hari' => 'Selasa',
                'waktu' => '10:00'
            ],
            
        ];

        foreach($dataJadwal as $key => $val){
            data_jadwal::create($val);
        }
    }
}
