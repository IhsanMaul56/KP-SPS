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
        Schema::create('data_kajurs', function (Blueprint $table) {
            $table->id('kode_kajur');
            $table->foreignId('guru_id')->constrained('data_gurus', 'nip');
            $table->string('nama_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kajurs');
    }
};