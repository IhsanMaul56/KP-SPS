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
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->string('nama_kelas');
            $table->foreignId('formatif_id')->constrained('nilai_formatifs', 'kode_formatif');
            $table->foreignId('sumatif_id')->constrained('nilai_sumatifs', 'kode_sumatif');
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
