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
            $table->foreignId('jurusan_id')->nullable()->constrained('data_jurusans', 'kode_jurusan');
            $table->string('nama_jurusan');
            $table->foreignId('tingkat_id')->constrained('data_tingkats', 'kode_tingkat');
            $table->string('nama_tingkat');
            $table->foreignId('tahun_id')->constrained('tahun_akademiks', 'kode_tahun');
            $table->string('nama_tahun');
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
