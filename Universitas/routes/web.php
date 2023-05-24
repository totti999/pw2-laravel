<?php

use App\Http\Controllers\FalkultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil', function(){
    return "halaman profil";
});

Route::get('login', [UserController::class,'login'])->name('login');
Route::get('register', [UserController::class,'register'])->name('register');
Route::post('login', [UserController::class, 'loginPost'])->name('user.login');
Route::post('register', [UserController::class,'registerPost'])->name('user.register');

Route::middleware('auth')->group(function () {
    Route::resource('fakultas', FalkultasController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('mahasiswa', MahasiswaController::class);

    Route::post('mhs-multi-delete', [MahasiswaController::class, 'multiDelete'])->name('mhs-multi-delete');
    Route::post('logout', [UserController::class, 'logout'])->name('user.logout');
});




