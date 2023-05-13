<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\AbsensiController;

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

// Menuju Halaman Login
Route::get('/', function () {
    return view('login');
});

// Menuju Halaman Beranda
Route::get('/beranda', function () {
    return view('pages/beranda', [
        "title" => "Beranda",
        "titlepage" => "Beranda"
    ]);
});

// Menuju Halaman Scan QR
Route::get('/scan-qr', function () {
    return view('pages/scan', [
        "title" => "Scan QR",
        "titlepage" => "Scan QR"
    ]);
});

// Menuju Halaman Input Murid
Route::get('/input-murid', [MuridController::class, 'index_input']);

// Menyimpan Data Input Murid
Route::post('/input-murid-proses', [MuridController::class, 'store']);

// Menuju Halaman Daftar Murid
Route::get('/daftar-murid', [MuridController::class, 'index_daftar']);
      
// Menuju Halaman Detail Murid
Route::get('/detail-murid/{murid:id}', [MuridController::class, 'show_detail']);

// Menuju Halaman Data Master Kelas
Route::get('/kelas', [KelasController::class, 'index']);
    
// Menyimpan Data Master Kelas
Route::post('/kelas-proses', [KelasController::class, 'store']);

// Menuju Halaman Data Master Tahun
Route::get('/tahun', function () {
    return view('pages/master/tahun', [
        "title" => "Data Tahun",
        "titlepage" => "Data Tahun"
    ]);
});

