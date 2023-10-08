<?php

use App\Http\Livewire\DataTableGuru;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Livewire\AkunGuru;
use App\Http\Livewire\AkunSiswa;
use App\Http\Livewire\TambahDataGuru;
use App\Http\Livewire\TambahDataSiswa;
use App\Http\Livewire\DataTablesExample;
use App\Http\Livewire\DataNilaiSiswa;
use App\Http\Livewire\DataNilaiGuru;
use App\Http\Livewire\ProfileAkun;


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
        Route::get('/', [DashboardController::class, 'index'])->name('beranda');
        Route::get('/tambah-guru', TambahDataGuru::class)->name('tambah-data-guru');
        Route::post('/tambah-guru', [TambahDataGuru::class, 'store'])->name('tambah-data-guru-store');
    });    

    Route::get('/dashboard/kurikulum', [DataGuruController::class, 'index']);

    Route::prefix('/dashboard')->group(function(){
        Route::get('/guru', [DataGuruController::class, 'index'])->name('guru');
        Route::get('/guru/edit', [AkunGuru::class])->name('guru.edit');
    });

    Route::prefix('/dashboard')->group(function(){
        Route::get('/siswa', [DataSiswaController::class, 'index'])->name('siswa');
        Route::get('/profile', [DataSiswaController::class, 'profile'])->name('profile-siswa');
        Route::post('/siswa/edit', AkunSiswa::class)->name('siswa.edit');
        // Route::post('/profile', [ProfileAkun::class, 'updatedPhoto'])->name('foto.siswa');
    });

    Route::get('/logout', [LoginController::class, 'logout']);
});

// Route::get('/profile', AkunGuru::class)->name('profile-guru');
Route::get('/tambah-siswa', TambahDataSiswa::class)->name('tambah-data-siswa');
Route::get('/input-nilai', DataNilaiSiswa::class)->name('tambah-nilai-siswa');

// Route::get('/dashboard/data-nilai', DataNilaiGuru::class)->name('data-nilai-siswa');



