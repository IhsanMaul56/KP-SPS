<?php

namespace Database\Seeders;

use App\Http\Livewire\DataAdmin;
use App\Http\Livewire\DataJadwal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([DataMapelSeeder::class]);
        $this->call([DataGuruSeeder::class]);
        $this->call([DataKajurSeeder::class]);
        $this->call([DataJurusanSeeder::class]);
        $this->call([DataTingkatSeeder::class]);
        $this->call([TahunAkademikSeeder::class]);
        $this->call([DataKelasSeeder::class]);
        $this->call([DataPengampuSeeder::class]);
        $this->call([DataJadwalSeeder::class]);
        $this->call([DataAdminSeeder::class]);
        $this->call([DataSiswaSeeder::class]);
        $this->call([DummyUserSeeder::class]);
        $this->call([DataElemenSeeder::class]);
        $this->call([DataCpSeeder::class]);
        $this->call([NilaiFormatifSeeder::class]);
        $this->call([NilaiSumatifSeeder::class]);
        $this->call([DataNilaiSementaraSeeder::class]);
        $this->call([DataWaliSeeder::class]);
    }
}