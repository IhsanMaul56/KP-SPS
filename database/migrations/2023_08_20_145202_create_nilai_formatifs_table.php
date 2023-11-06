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
        Schema::create('nilai_formatifs', function (Blueprint $table) {
            $table->id('kode_formatif');
            $table->foreignId('mapel_id')->constrained('data_mapels', 'kode_mapel');
            $table->string('nama_mapel');
            $table->foreignId('tingkat_id')->constrained('data_tingkats', 'kode_tingkat');
            $table->string('nama_tingkat');
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->string('nama_kelas');
            $table->foreignId('siswa_id')->constrained('data_siswas', 'nis');
            $table->string('nama_siswa');
            $table->string('kuis');
            $table->string('tugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_formatifs');
    }
};
