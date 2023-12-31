<?php

use App\Models\data_mapel;
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
        Schema::create('data_jadwals', function (Blueprint $table) {
            $table->id('kode_jadwal');
            $table->string('hari');
            $table->time('waktu_masuk');
            $table->time('waktu_keluar');
            $table->foreignId('tingkat_id')->constrained('data_tingkats', 'kode_tingkat');
            $table->string('nama_tingkat');
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->string('nama_kelas');
            $table->foreignId('pengampu_id')->constrained('data_pengampus', 'kode_pengampu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_jadwals');
    }
};
