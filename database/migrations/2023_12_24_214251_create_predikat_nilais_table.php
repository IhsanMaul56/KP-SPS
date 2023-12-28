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
        Schema::create('predikat_nilais', function (Blueprint $table) {
            $table->id('kode_predikat');
            $table->foreignId('pengampu_id')->constrained('data_pengampus', 'kode_pengampu');
            $table->string('nilai_d');
            $table->string('nilai_c');
            $table->string('nilai_b');
            $table->string('nilai_a');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predikat_nilais');
    }
};
