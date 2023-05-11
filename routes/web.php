<?php

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

// Menuju Halaman Daftar Murid
Route::get('/daftar-murid', function () {
    return view('pages/murid/daftarmurid', [
        "title" => "Daftar Murid",
        "titlepage" => "Daftar Murid"
    ]);
});
