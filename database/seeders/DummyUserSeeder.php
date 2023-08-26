<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'admin_id' => '1',
                'email' => 'admin@gmail.com',
                'password' => '12345',
                'role' => 'admin'
            ],
            [
                'name' => 'Nasrullah Nurul R',
                'guru_id' => '1000',
                'email' => 'nasrul@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Samsori',
                'guru_id' => '2000',
                'email' => 'samsori@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
               'name' => 'Lukman',
                'guru_id' => '3000',
                'email' => 'lukman@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Farhan',
                'guru_id' => '4000',
                'email' => 'farhan@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Diyah',
                'guru_id' => '5000',
                'email' => 'diyah@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Sopi',
                'guru_id' => '6000',
                'email' => 'sopi@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Alya',
                'guru_id' => '7000',
                'email' => 'alya@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Hakim',
                'guru_id' => '4000',
                'email' => 'hakim@gmail.com',
                'password' => '12345',
                'role' => 'kurikulum'
            ],
            [
                'name' => 'Ihsan',
                'siswa_id' => '1000',
                'email' => 'ihsan@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'Nisa',
                'siswa_id' => '2000',
                'email' => 'nisa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'Afuza',
                'siswa_id' => '3000',
                'email' => 'afuza@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
            [
                'name' => 'Siti',
                'siswa_id' => '4000',
                'email' => 'siti@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
