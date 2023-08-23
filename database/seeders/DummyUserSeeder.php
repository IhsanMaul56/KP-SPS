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
                'role' => 'kurikulum'
            ],
            [
                'name' => 'Samsori',
                'guru_id' => '2000',
                'email' => 'samsori@gmail.com',
                'password' => '12345',
                'role' => 'guru'
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
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
