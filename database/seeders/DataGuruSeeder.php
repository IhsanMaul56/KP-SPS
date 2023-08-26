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
                'nip' => '1000',
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
                'nip' => '2000',
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
                'nip' => '3000',
                'nama_guru'=> 'Lukman S.Pd',
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
                'nip' => '4000',
                'nama_guru'=> 'Farhan S.Pd',
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
                'nip' => '5000',
                'nama_guru'=> 'Diyah S.Pd',
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
                'nip' => '6000',
                'nama_guru'=> 'Sopi S.Pd',
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
                'nip' => '7000',
                'nama_guru'=> 'Alya S.Pd',
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
                'nip' => '8000',
                'nama_guru'=> 'Hakim S.Pd',
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
        ];

        foreach ($dataGuru as $key => $val){
            data_guru::create($val);
        }
    }
}
