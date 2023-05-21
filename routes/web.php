<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaturanController;


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
Route::get('/', [LoginController::class, 'index'])->name('login');  

// Proses Login
Route::post('/', [LoginController::class, 'authenticate']); 

// Proses Logout
Route::post('/keluar', [LoginController::class, 'logout']); 

// Menuju Halaman Beranda
Route::get('/beranda', [DashboardController::class, 'index'])->middleware('auth');

// Menuju Halaman Scan QR
Route::get('/scan-qr', [AbsensiController::class, 'index'])->middleware('auth');

// Proses Scan QR
Route::get('/scan-qr/{absensi}', [AbsensiController::class, 'store']);

// Halaman Standalone-Scan
Route::get('/scan-qr-standalone', function() {
    
    return view('/pages/scan-standalone');
});

// Proses Absensi Otomatis Ganti Hari
Route::get('/auto-run', [AbsensiController::class, 'gantiHari']);

// Menuju Halaman Input Murid
Route::get('/input-murid', [MuridController::class, 'index_input'])->middleware('auth');

// Menyimpan Data Input Murid
Route::post('/input-murid-proses', [MuridController::class, 'store'])->middleware('auth');

// Menuju Halaman Daftar Murid
Route::get('/daftar-murid', [MuridController::class, 'index_daftar'])->middleware('auth');

// Menuju Halaman Daftar Murid
Route::get('/daftar-murid/json', [MuridController::class, 'data'])->middleware('auth');
      
// Fungsi Hapus Murid
Route::post('/detail-murid/hapus/{murid}', [MuridController::class, 'destroy']);

// Menuju Halaman Detail Murid
Route::get('/detail-murid/{murid}', [MuridController::class, 'show_detail']);

// // Fungsi Menampilkan Absensi Dengan Range Tertentu
// Route::post('/detail-murid/{id}', [AbsensiController::class, 'show_range'])->middleware('auth');

// Menuju Halaman Daftar Kelas
Route::get('/kelas/daftar', [KelasController::class, 'index'])->middleware('auth');

// Menuju Halaman Detail Kelas
Route::get('/kelas/daftar/{id}', [KelasController::class, 'index_detail'])->middleware('auth');

// Menuju Halaman Data Master Kelas
Route::get('/kelas', [KelasController::class, 'index_master'])->middleware('auth');
    
// Menyimpan Data Master Kelas
Route::post('/kelas-proses', [KelasController::class, 'store']);

// Hapus Kelas
Route::post('/kelas/hapus/{id}', [KelasController::class, 'destroy']);

// Menuju Halaman Data Master Tahun
Route::get('/tahun', [TahunController::class, 'index'])->middleware('auth');  

// Menyimpan Data Master Tahun
Route::post('/tahun-proses', [TahunController::class, 'store']);

// Untuk mendownload kartu absen siswa satuan
Route::get('/download-kartu-satuan/{murid:id}', [PdfController::class, 'downloadKartuSatuan'])->middleware('auth');

// Untuk mendownload kartu absen siswa secara massal per-kelas
Route::get('/download-kartu-massal/{kelas:id}', [PdfController::class, 'downloadKartuMassal'])->middleware('auth');

// Halaman Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'show'])->middleware('auth');


