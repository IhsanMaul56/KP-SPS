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
        Schema::create('data_elemens', function (Blueprint $table) {
            $table->id('kode_elemen');
            $table->string('nama_elemen');
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
        Schema::dropIfExists('data_elemens');
    }
};
