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
                'email' => 'admin@gmail.com',
                'password' => '12345',
                'role' => 'admin'
            ],
            [
                'name' => 'Kurikulum',
                'email' => 'kurikulum@gmail.com',
                'password' => '12345',
                'role' => 'kurikulum'
            ],
            [
                'name' => 'Guru',
                'email' => 'guru@gmail.com',
                'password' => '12345',
                'role' => 'guru'
            ],
            [
                'name' => 'Siswa',
                'email' => 'Siswa@gmail.com',
                'password' => '12345',
                'role' => 'siswa'
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
