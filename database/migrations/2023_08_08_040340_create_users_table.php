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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['guru','kurikulum', 'admin', 'siswa']);
            $table->foreignId('admin_id')->nullable()->constrained('data_admins', 'kode_admin');
            $table->foreignId('guru_id')->nullable()->constrained('data_gurus', 'nip');
            $table->foreignId('siswa_id')->nullable()->constrained('data_siswas', 'nis');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
