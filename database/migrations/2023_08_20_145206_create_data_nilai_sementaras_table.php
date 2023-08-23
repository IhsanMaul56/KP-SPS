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
        Schema::create('data_nilai_sementaras', function (Blueprint $table) {
            $table->id('kode_nilai_sementara');
            $table->foreignId('siswa_id')->constrained('data_siswas', 'nis');
            $table->foreignId('kelas_id')->nullable()->constrained('data_kelas', 'kode_kelas');
            $table->string('tahun_ajar');
            $table->foreignId('mapel_id')->constrained('data_mapels', 'kode_mapel');
            $table->foreignId('pengampu_id')->constrained('data_gurus', 'nip');
            $table->foreignId('wali_id')->constrained('data_gurus', 'nip');
            $table->string('nilai_kehadiran');
            $table->string('nilai_tugas');
            $table->string('nilai_uts');
            $table->string('nilai_uas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_nilai_sementaras');
    }
};
