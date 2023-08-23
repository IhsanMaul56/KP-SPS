<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_kelas', function (Blueprint $table) {
            $table->id('kode_kelas');
            $table->string('nama_kelas');
            $table->foreignId('jurusan_id')->constrained('data_jurusans', 'kode_jurusan');
            $table->foreignId('jadwal_id')->constrained('data_jadwals', 'kode_jadwal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kelas');
    }
};
