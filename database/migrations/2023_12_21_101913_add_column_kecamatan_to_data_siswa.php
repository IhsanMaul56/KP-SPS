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
        Schema::table('data_siswas', function (Blueprint $table) {
            $table->string('kecamatan')->nullable()->after('kota');
            $table->string('kecamatan_ortu')->nullable()->after('kota_ortu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswas', function (Blueprint $table) {
            $table->dropColumn('kecamatan');
            $table->dropColumn('kecamatan_ortu');
        });
    }
};
