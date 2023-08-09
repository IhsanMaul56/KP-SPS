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
        Schema::create('data_nilai_akhir', function (Blueprint $table) {
            $table->id('kode_nilai');
            $table->string('nis')->unique();
            $table->string('nama_siswa');
            $table->string('jurusan');
            $table->string('kelas');
            $table->string('kode_mapel')->unique();
            $table->string('nama_mapel');
            $table->string('nip_pengampu')->unique();
            $table->string('nama_pengampu');
            $table->string('nip_guru_wali')->unique();
            $table->string('nama_guru_wali');
            $table->string('nilai_kehadiran');
            $table->string('nilai_tugas');
            $table->string('nilai_uts');
            $table->string('nilai_uas');
            $table->string('kb_pengetahuan');
            $table->string('nilai_pengetahuan');
            $table->longText('desc_pengetahuan');
            $table->string('kb_keterampilan');
            $table->string('nilai_keterampilan');
            $table->longText('desc_keterampilan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_nilai_akhir');
    }
};
