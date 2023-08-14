<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

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
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/kurikulum', [DashboardController::class, 'index']);
    Route::get('/dashboard/guru', [DataGuruController::class, 'index']);
    Route::get('/dashboard/siswa', [DashboardController::class, 'index']);
    Route::get('/logout', [LoginController::class, 'logout']);
});

Route::get('/dashboard/siswa', function(){
    return view('siswa');
});

Route::get('/dashboard/guru', function(){
    return view('/data_guru');
});