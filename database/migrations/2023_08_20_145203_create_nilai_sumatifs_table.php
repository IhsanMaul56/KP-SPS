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
        Schema::create('nilai_sumatifs', function (Blueprint $table) {
            $table->id('kode_sumatif');
            $table->foreignId('mapel_id')->constrained('data_mapels', 'kode_mapel');
            $table->string('nama_mapel');
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->string('nama_kelas');
            $table->string('uts');
            $table->string('uas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sumatifs');
    }
};