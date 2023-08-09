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
        Schema::create('data_guru', function (Blueprint $table) {
            $table->id('nip');
            $table->string('password');
            $table->enum('role',['guru','kurikulum']);
            $table->string('nama_guru');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['Pria','Wanita']);
            $table->string('agama');
            $table->string('no_hp');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('desa');
            $table->string('rt');
            $table->string('rw');
            $table->string('alamat');
            $table->binary('foto_guru');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_guru');
    }
};
