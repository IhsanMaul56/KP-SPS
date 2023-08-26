<?php

namespace Database\Seeders;

use App\Models\data_siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSiswa = [
            [
                'nis' => '1000',
                'nama_siswa' => 'Ihsan',
                'tempat_lahir' => 'Purwakarta',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'Pria',
                'agama' => 'Islam',
                'no_hp' => '083123123123',
                'provinsi' => 'Jawa Barat',
                'kota' => 'Purwakarta',
                'desa' => 'Darangdan',
                'rt' => '11',
                'rw' => '03',
                'alamat' => 'kp. Sukamaju',
                'nik_ayah' => '123123',
                'nama_ayah' => 'Gusti',
                'pekerjaan_ayah' => 'Guru',
                'nik_ibu' => '123123',
                'nama_ibu' => 'Chika',
                'pekerjaan_ibu' => 'Guru',
                'provinsi_ortu' => 'Jawa Barat',
                'kota_ortu' => 'Purwakarta',
                'desa_ortu' => 'Darangdan',
                'rt_ortu' => '11',
                'rw_ortu' => '03',
                'alamat_ortu' => 'kp. Sukamaju',
                'foto_siswa' => '',
                'kelas_id' => '1'
            ],
            [
                'nis' => '2000',
                'nama_siswa' => 'Nisa',
                'tempat_lahir' => 'Purwakarta',
                'tanggal_lahir' => '2001-01-01',
                'jenis_kelamin' => 'Pria',
                'agama' => 'Islam',
                'no_hp' => '083123123123',
                'provinsi' => 'Jawa Barat',
                'kota' => 'Purwakarta',
                'desa' => 'Darangdan',
                'rt' => '11',
                'rw' => '03',
                'alamat' => 'kp. Sukamaju',
                'nik_ayah' => '123123',
                'nama_ayah' => 'Gusti',
                'pekerjaan_ayah' => 'Guru',
                'nik_ibu' => '123123',
                'nama_ibu' => 'Chika',
                'pekerjaan_ibu' => 'Guru',
                'provinsi_ortu' => 'Jawa Barat',
                'kota_ortu' => 'Purwakarta',
                'desa_ortu' => 'Darangdan',
                'rt_ortu' => '11',
                'rw_ortu' => '03',
                'alamat_ortu' => 'kp. Sukamaju',
                'foto_siswa' => '',
                'kelas_id' => '2'
            ],
        ];

        foreach ($dataSiswa as $key => $val){
            data_siswa::create($val);
        }
    }
}
