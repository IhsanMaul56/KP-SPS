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
        Schema::create('data_cps', function (Blueprint $table) {
            $table->id('kode_cp');
            $table->string('nama_cp');
            $table->foreignId('elemen_id')->constrained('data_elemens', 'kode_elemen');
            $table->string('nama_elemen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_cps');
    }
};