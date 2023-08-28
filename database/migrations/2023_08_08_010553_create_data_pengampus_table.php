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
        Schema::create('data_pengampus', function (Blueprint $table) {
            $table->id('kode_pengampu');
            $table->foreignId('pengampu_id')->constrained('data_gurus', 'nip');
            $table->string('nama_guru');
            $table->foreignId('mapel_id')->constrained('data_mapels', 'kode_mapel');
            $table->string('nama_mapel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengampus');
    }
};
