<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\akunController;
use App\Http\Controllers\umumController;
use App\Http\Controllers\agamaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\divisiController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\artikelController;
use App\Http\Controllers\kontentController;
use App\Http\Controllers\angkatanController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\dokumentasiController;
use App\Http\Controllers\dashboardAnggotaController;
use App\Http\Controllers\pendaftarController;

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

Route::get('/', [umumController::class, 'home']);

// route dashboard
Route::get('/dashboard/anggota', [dashboardAnggotaController::class, 'dashboard'])->middleware('auth');

// route divisi
Route::get('/dashboard/anggota/divisi', [divisiController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota/divisi/create', [divisiController::class, 'create'])->middleware('auth');
Route::put('/dashboard/anggota/divisi/delete/{id}', [divisiController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/divisi/update/{id}', [divisiController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/divisi/update/{id}', [divisiController::class, 'update_aksi'])->middleware('auth');


// route agama
Route::get('/dashboard/anggota/agama', [agamaController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota/agama/create', [agamaController::class, 'create'])->middleware('auth');
Route::put('/dashboard/anggota/agama/delete/{id}', [agamaController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/agama/update/{id}', [agamaController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/agama/update/{id}', [agamaController::class, 'update_aksi'])->middleware('auth');


// angkatan
Route::get('/dashboard/anggota/angkatan', [angkatanController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota/angkatan/create', [angkatanController::class, 'create'])->middleware('auth');
Route::put('/dashboard/anggota/angkatan/delete/{id}', [angkatanController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/angkatan/update/{id}', [angkatanController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/angkatan/update/{id}', [angkatanController::class, 'update_aksi'])->middleware('auth');

// route status
Route::get('/dashboard/anggota/status', [statusController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota/status/create', [statusController::class, 'create'])->middleware('auth');
Route::put('/dashboard/anggota/status/delete/{id}', [statusController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/status/update/{id}', [statusController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/status/update/{id}', [statusController::class, 'update_aksi'])->middleware('auth');

// route anggota
Route::get('/dashboard/anggota/anggota', [anggotaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/anggota/anggota/create', [anggotaController::class, 'create'])->middleware('auth');
Route::post('/dashboard/anggota/anggota/create', [anggotaController::class, 'create_aksi'])->middleware('auth');
Route::get('/dashboard/anggota/anggota/detail/{id}', [anggotaController::class, 'detail'])->middleware('auth');
Route::get('/dashboard/anggota/anggota/update/{id}', [anggotaController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/anggota/update', [anggotaController::class, 'update_aksi'])->middleware('auth');
Route::put('/dashboard/anggota/anggota/delete/{id}', [anggotaController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/laporan/anggota', [anggotaController::class, 'laporan'])->middleware('auth');
Route::get('/dashboard/anggota/laporan/anggota/cetak/{id}', [anggotaController::class, 'cetakLaporan']);

// route Akun
Route::get('/dashboard/anggota/akun', [akunController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota/akun/create', [akunController::class, 'create'])->middleware('auth');
Route::put('/dashboard/anggota/akun/delete/{id}', [akunController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/akun/update/{id}', [akunController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/akun/update/{id}', [akunController::class, 'update_aksi'])->middleware('auth');
Route::get('/dashboard/anggota/akun/detail/{id}', [akunController::class, 'detail'])->middleware('auth');


// route login
Route::get('/login', [loginController::class, 'index'])->middleware('guest');
Route::post('/login', [loginController::class, 'login']);

// route logout
Route::get('/logout', [logoutController::class, 'logout']);

// profil
Route::get('/dashboard/anggota/profil/{id}', [profilController::class, 'profil'])->middleware('auth');
Route::get('/dashboard/anggota/profil/setting/{id}', [profilController::class, 'setting'])->middleware('auth');
Route::put('/dashboard/anggota/profil/setting', [profilController::class, 'setting_aksi'])->middleware('auth');

// kategori
Route::get('/dashboard/anggota/kategori', [kategoriController::class, 'index'])->middleware('auth');
Route::post('/dashboard/anggota/kategori/create', [kategoriController::class, 'create'])->middleware('auth');
Route::put('/dashboard/anggota/kategori/delete/{id}', [kategoriController::class, 'delete'])->middleware('auth');
Route::get('/dashboard/anggota/kategori/update/{id}', [kategoriController::class, 'update'])->middleware('auth');
Route::put('/dashboard/anggota/kategori/update/{id}', [kategoriController::class, 'update_aksi'])->middleware('auth');


// artikel
Route::get('/dashboard/anggota/artikel', [artikelController::class, 'index']);
Route::get('/dashboard/anggota/artikel/create', [artikelController::class, 'artikel']);
Route::post('/dashboard/anggota/artikel/create', [artikelController::class, 'create']);
Route::get('/dashboard/anggota/artikel/show/{id}', [artikelController::class, 'show']);
Route::put('/dashboard/anggota/artikel/delete/{id}', [artikelController::class, 'delete']);
Route::get('/dashboard/anggota/artikel/update/{id}', [artikelController::class, 'update']);
Route::put('/dashboard/anggota/artikel/update/{id}', [artikelController::class, 'update_aksi']);


// route dokumentasi
Route::get('/dashboard/anggota/dokumentasi', [dokumentasiController::class, 'index']);
Route::post('/dashboard/anggota/dokumentasi/create', [dokumentasiController::class, 'create']);
Route::put('/dashboard/anggota/dokumentasi/delete/{id}', [dokumentasiController::class, 'delete']);

// route konten
Route::get('/dashboard/anggota/konten', [kontentController::class, 'index']);
Route::get('/dashboard/anggota/konten/create', [kontentController::class, 'create']);
Route::post('/dashboard/anggota/konten/create', [kontentController::class, 'create_aksi']);
Route::put('/dashboard/anggota/konten/delete/{id}', [kontentController::class, 'delete']);
Route::get('/dashboard/anggota/konten/update/{id}', [kontentController::class, 'update']);
Route::put('/dashboard/anggota/konten/update/{id}', [kontentController::class, 'update_aksi']);

// route umum
Route::get('/home', [umumController::class, 'home']);
Route::get('/anggota/{id}', [umumController::class, 'anggota']);
Route::get('/artikel/{id}', [umumController::class, 'artikel']);
Route::get('/artikel/view/{id}', [umumController::class, 'view_artikel']);
Route::get('/daftar', [umumController::class, 'daftar']);
Route::post('/daftar', [umumController::class, 'daftar_aksi']);
Route::get('/info', [umumController::class, 'info']);


// route pendaftar
Route::get('/dashboard/anggota/pendaftar', [pendaftarController::class, 'index']);
Route::get('/dashboard/anggota/pendaftar/detail/{id}', [pendaftarController::class, 'detail']);
Route::put('/dashboard/anggota/pendaftar/delete/{id}', [pendaftarController::class, 'delete']);
Route::get('/dashboard/anggota/laporan/pendaftar', [pendaftarController::class, 'laporan'])->middleware('auth');
Route::get('/dashboard/anggota/laporan/pendaftar/cetak/{tahun_masuk}', [pendaftarController::class, 'cetakLaporan']);
