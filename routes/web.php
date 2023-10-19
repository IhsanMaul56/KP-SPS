<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Livewire\AkunGuru;
use App\Http\Livewire\AkunSiswa;
use App\Http\Livewire\DataGuruMapel;
use App\Http\Livewire\DataGuruWali;
use App\Http\Livewire\DataNilaiGuru;
use App\Http\Livewire\TambahDataGuru;
use App\Http\Livewire\TambahDataSiswa;
use App\Http\Livewire\DataNilaiSiswa;
use App\Http\Livewire\GuruWali;
use App\Http\Livewire\DataGuru;
use App\Http\Livewire\DataSiswa;
use App\Http\Livewire\DataJadwal;
use App\Http\Livewire\DataJurusan;
use App\Http\Livewire\DataKelas;
use App\Http\Livewire\EditDataGuru;
use App\Http\Livewire\TabelSiswa;
use App\Http\Livewire\TableGuru;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function(){
    
    Route::prefix('/dashboard')->group(function(){
        Route::get('/admin', [DashboardController::class, 'index'])->name('beranda');
        Route::get('/admin/tambah-guru', TambahDataGuru::class)->name('tambah-data-guru');
        Route::post('/admin/tambah-guru', [TambahDataGuru::class, 'store'])->name('tambah-data-guru-store');
        Route::get('/admin/update-data-guru/{nip}', [TambahDataGuru::class, 'viewUpdate'])->name('update-data-guru');
        Route::post('/admin/update-data-guru', [TambahDataGuru::class, 'update'])->name('update-data-guru-post');
        Route::get('/admin/tambah-siswa', TambahDataSiswa::class)->name('tambah-data-siswa');
        Route::post('/admin/tambah-siswa', [TambahDataSiswa::class, 'store'])->name('tambah-data-siswa-store');
        Route::get('/admin/edit-siswa/{nis}', [TambahDataSiswa::class, 'viewUpdate'])->name('update-data-siswa');
        Route::post('/admin/edit-siswa', [TambahDataSiswa::class, 'update'])->name('update-data-siswa-post');
        Route::get('/admin/kelas', [DataKelas::class, 'tampil'])->name('data-kelas');
        Route::post('/admin/insert-kelas', [DataKelas::class, 'createKelas'])->name('create-kelas');
        Route::post('/admin/update-kelas', [DataKelas::class, 'updateKelas'])->name('update-kelas');
        // Route::get('/admin/tambah-wali', [GuruWali::class, 'create_wali'])->name('create-data-wali');
        Route::get('/admin/tambah-guru-mapel', [DataGuruMapel::class, 'create_gumapel'])->name('create-guru-mapel');
        
    });
    
    Route::prefix('/dashboard')->group(function(){
        Route::get('kurikulum', [DataGuruController::class, 'index']);
        Route::get('/guru-wali', [DataGuruWali::class, 'tampil'])->name('data-walis');
        Route::get('/guru-mapel', [DataGuruMapel::class, 'tampil'])->name('data-mapels');
        Route::get('/guru-master', [DataGuru::class, 'tampil'])->name('master-guru');
        Route::get('/data-siswa', [DataSiswa::class, 'tampil'])->name('siswa-kurikulum');
        Route::get('/jadwal-pelajaran', [DataJadwal::class, 'tampil'])->name('m-jadwal');
        Route::get('/jurusan', [DataJurusan::class, 'tampil'])->name('m-jurusan');
        Route::get('/kelas', [DataKelas::class, 'tampil'])->name('m-kelas');
        // Route::get('/profile', [AkunGuru::class, 'ProfileKurikulum'])->name('m-kelas');
    });

    Route::prefix('/dashboard')->group(function(){
        Route::get('/guru', [TableGuru::class, 'tampil'])->name('guru');
        Route::get('/nilai-guru', [DataNilaiGuru::class, 'tampil'])->name('nilai-gurus');
        Route::get('/nilai-siswa', [GuruWali::class, 'tampil'])->name('nilai-walis');
        Route::get('/guru/edit', [AkunGuru::class])->name('guru.edit');
        Route::get('/profile-guru', [AkunGuru::class, 'tampilGuru'])->name('profile-guru');
    });

    Route::prefix('/dashboard')->group(function(){
        Route::get('/siswa', [TabelSiswa::class, 'tampil'])->name('siswa');
        Route::post('/siswa/edit', AkunSiswa::class)->name('siswa.edit');
        Route::get('/profile-siswa', [AkunSiswa::class, 'profile'])->name('profile-siswa');
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});

// Route::get('/tambah-siswa', TambahDataSiswa::class)->name('tambah-data-siswa');
Route::get('/input-nilai', DataNilaiSiswa::class)->name('tambah-nilai-siswa');