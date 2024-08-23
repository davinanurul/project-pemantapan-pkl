<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PerjalananController;
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

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('cek-login');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('register-proses', [LoginController::class, 'registerProses'])->name('register-proses');

//perjalanan
Route::get('perjalanan', [PerjalananController::class, 'perjalanan']);
Route::post('perjalanan', [PerjalananController::class, 'store']);
Route::delete('perjalanan/{perjalanan}', [PerjalananController::class, 'destroy']);
Route::patch('perjalanan/{perjalanan}', [PerjalananController::class, 'update']);
//penduduk
Route::get('penduduk', [PendudukController::class, 'penduduk']);
Route::post('penduduk', [PendudukController::class, 'store']);
Route::delete('penduduk/{penduduk}', [PendudukController::class, 'destroy']);
Route::patch('penduduk/{penduduk}', [PendudukController::class, 'update']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth:penduduk'], 'as' => 'admin.'], function(){
    //home
    Route::get('home', [HomeController::class, 'index'])->name('home');
    //log
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
