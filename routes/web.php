<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pasien', [App\Http\Controllers\PasienController::class, 'index'])->name('pasien');
Route::get('/pasien/tambah', [App\Http\Controllers\PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien/store', [App\Http\Controllers\PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/edit/{pasien}', [App\Http\Controllers\PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/update', [App\Http\Controllers\PasienController::class, 'update'])->name('pasien.update');
Route::get('/pasien/hapus/{pasien}', [App\Http\Controllers\PasienController::class, 'hapus'])->name('pasien.hapus');

Route::get('/pelayanan', [App\Http\Controllers\PelayananController::class, 'index'])->name('pelayanan');
Route::get('/pelayanan/tambah', [App\Http\Controllers\PelayananController::class, 'create'])->name('pelayanan.create');
Route::post('/pelayanan/store', [App\Http\Controllers\PelayananController::class, 'store'])->name('pelayanan.store');
Route::get('/pelayanan/edit/{pelayanan}', [App\Http\Controllers\PelayananController::class, 'edit'])->name('pelayanan.edit');
Route::put('/pelayanan/update', [App\Http\Controllers\PelayananController::class, 'update'])->name('pelayanan.update');
Route::get('/pelayanan/hapus/{pelayanan}', [App\Http\Controllers\PelayananController::class, 'hapus'])->name('pelayanan.hapus');

Route::get('/pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'index'])->name('pendaftaran');
Route::get('/pendaftaran/tambah', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran/store', [App\Http\Controllers\PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/edit/{pendaftaran}', [App\Http\Controllers\PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
Route::put('/pendaftaran/update', [App\Http\Controllers\PendaftaranController::class, 'update'])->name('pendaftaran.update');
Route::get('/pendaftaran/hapus/{pendaftaran}', [App\Http\Controllers\PendaftaranController::class, 'hapus'])->name('pendaftaran.hapus');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
