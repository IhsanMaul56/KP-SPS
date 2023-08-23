<?php

namespace Database\Seeders;

use App\Models\data_admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            [
                'nama_admin' => 'admin'
            ]
        ];

        foreach($adminData as $key => $val){
            data_admin::create($val);
        }
    }
}
