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
        Schema::create('data_nilai_akhirs', function (Blueprint $table) {
            $table->id('kode_nilai_akhir');
            $table->string('tahun_ajar');
            $table->string('kb_pengetahuan');
            $table->string('nilai_pengetahuan');
            $table->longText('desc_pengetahuan');
            $table->string('kb_keterampilan');
            $table->string('nilai_keterampilan');
            $table->longText('desc_keterampilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_nilai_akhirs');
    }
};
