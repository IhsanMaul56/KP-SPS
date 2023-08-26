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
        Schema::create('data_walis', function (Blueprint $table) {
            $table->id('kode_wali');
            $table->foreignId('wali_id')->constrained('data_gurus', 'nip');
            $table->string('nama_guru');
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->string('nama_kelas');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_walis');
    }
};
