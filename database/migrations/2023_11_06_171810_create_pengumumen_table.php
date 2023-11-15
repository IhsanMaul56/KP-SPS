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
        Schema::create('pengumumaans', function (Blueprint $table) {
            $table->id('kode_pengumuman');
            $table->string('deskripsi');
            $table->foreignId('guru_id')->constrained('data_gurus', 'nip');
            $table->string('nama_guru');
            $table->foreignId('tingkat_id')->constrained('data_tingkats', 'kode_tingkat');
            $table->string('nama_tingkat');
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->string('nama_kelas');
            $table->string('mapel_id')->constrained('data_mapels', 'kode_mapel');
            $table->string('nama_mapel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumumaans');
    }
};
