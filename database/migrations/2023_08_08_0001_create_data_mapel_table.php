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
        Schema::create('data_mapel', function (Blueprint $table) {
            $table->id('kode_mapel');
            $table->string('nama_mapel');
            $table->string('nip')->unique();
            $table->string('nama_guru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mapel');
    }
};
