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
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->id('nis');
            $table->string('nama_siswa');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('agama');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('desa');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('nik_ayah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nik_ibu');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('provinsi_ortu');
            $table->string('kota_ortu');
            $table->string('desa_ortu');
            $table->string('rt_ortu');
            $table->string('rw_ortu');
            $table->string('alamat_ortu');
            $table->binary('foto_siswa')->nullable();
            $table->foreignId('kelas_id')->constrained('data_kelas', 'kode_kelas');
            $table->foreignId('tingkat_id')->constrained('data_tingkats', 'kode_tingkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_siswas');
    }
};
