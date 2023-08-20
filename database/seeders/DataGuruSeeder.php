<?php

namespace Database\Seeders;

use App\Models\data_guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataGuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataGuru = [
            [
                'nip' => '0001',
                'nama_guru'=> 'Nasrullah Nurul R, S.Pd., M.Pd.',
                'tempat_lahir'=> 'Bandung',
                'tanggal_lahir'=> '1990-01-01',
                'jenis_kelamin'=> 'Pria',
                'agama'=> 'Islam',
                'no_hp'=> '08123123123',
                'provinsi'=> 'Jawa Barat',
                'kota'=> 'Cimahi',
                'desa'=> 'Cibeber',
                'rt'=> '01',
                'rw'=> '01',
                'alamat'=> 'jl. Ibu gandirah',
                'foto_guru' => ''
            ],
            [
                'nip' => '0002',
                'nama_guru'=> 'Dr. Samsori, S.Pd., M.Pd',
                'tempat_lahir'=> 'Bandung',
                'tanggal_lahir'=> '1990-01-01',
                'jenis_kelamin'=> 'Pria',
                'agama'=> 'Islam',
                'no_hp'=> '08123123123',
                'provinsi'=> 'Jawa Barat',
                'kota'=> 'Cimahi',
                'desa'=> 'Cibeber',
                'rt'=> '01',
                'rw'=> '01',
                'alamat'=> 'jl. Ibu gandirah',
                'foto_guru' => ''
            ],
            [
                'nip' => '0003',
                'nama_guru'=> 'Sri Umi Mardiasih, S.Pd., M.Pd.	',
                'tempat_lahir'=> 'Bandung',
                'tanggal_lahir'=> '1990-01-01',
                'jenis_kelamin'=> 'Wanita',
                'agama'=> 'Islam',
                'no_hp'=> '08123123123',
                'provinsi'=> 'Jawa Barat',
                'kota'=> 'Cimahi',
                'desa'=> 'Cibeber',
                'rt'=> '01',
                'rw'=> '01',
                'alamat'=> 'jl. Ibu gandirah',
                'foto_guru' => ''
            ],
            [
                'nip' => '0004',
                'nama_guru'=> 'Endriyanto Trilaksono, S.Pd.',
                'tempat_lahir'=> 'Bandung',
                'tanggal_lahir'=> '1990-01-01',
                'jenis_kelamin'=> 'Pria',
                'agama'=> 'Islam',
                'no_hp'=> '08123123123',
                'provinsi'=> 'Jawa Barat',
                'kota'=> 'Cimahi',
                'desa'=> 'Cibeber',
                'rt'=> '01',
                'rw'=> '01',
                'alamat'=> 'jl. Ibu gandirah',
                'foto_guru' => ''
            ],
            [
                'nip' => '0005',
                'nama_guru'=> 'M. Abu Darin, S.Ag.',
                'tempat_lahir'=> 'Bandung',
                'tanggal_lahir'=> '1990-01-01',
                'jenis_kelamin'=> 'Pria',
                'agama'=> 'Islam',
                'no_hp'=> '08123123123',
                'provinsi'=> 'Jawa Barat',
                'kota'=> 'Cimahi',
                'desa'=> 'Cibeber',
                'rt'=> '01',
                'rw'=> '01',
                'alamat'=> 'jl. Ibu gandirah',
                'foto_guru' => ''
            ]
        ];

        foreach ($dataGuru as $key => $val){
            data_guru::create($val);
        }
    }
}
