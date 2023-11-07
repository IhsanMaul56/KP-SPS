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
        Schema::create('bobot_nilais', function (Blueprint $table) {
            $table->id('kode_bobot');
            $table->foreignId('pengampu_id')->constrained('data_pengampus', 'kode_pengampu');
            $table->string('formatif_akhir');
            $table->string('sumatif_uts');
            $table->string('sumatif_uas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_nilais');
    }
};
