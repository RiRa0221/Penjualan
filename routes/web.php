<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pelanggan;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;


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

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class,'login'])->name('login');
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::resource('/index', \App\Http\Controllers\HomeController::class);

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::resource('pelanggans', PelangganController::class);

Route::resource('produks', ProdukController::class);

Route::resource('penjualans', PenjualanController::class);

Route::resource('detail_penjualans', DetailPenjualanController::class);

Route::get('/pelanggans.pdf', function () {
    $pelanggans = Pelanggan::all(); // Ambil semua data
    
    $pdf = Pdf::loadView('pelanggans.pdf', compact('pelanggans'));
    return $pdf->download('pelanggans-data.pdf');
})->name('pelanggans.pdf');

Route::get('/produks.pdf', function () {
    $produks = Produk::all(); // Ambil semua data
    
    $pdf = Pdf::loadView('produks.pdf', compact('produks'));
    return $pdf->download('produks-data.pdf');
})->name('produks.pdf');

Route::get('/penjualans.pdf', function () {
    $penjualans = Penjualan::all(); // Ambil semua data
    
    $pdf = Pdf::loadView('penjualans.pdf', compact('penjualans'));
    return $pdf->download('penjualans-data.pdf');
})->name('penjualans.pdf');

Route::get('/detail_penjualans.pdf', function () {
    $detail_penjualans = DetailPenjualan::all(); // Ambil semua data
    
    $pdf = Pdf::loadView('detail_penjualans.pdf', compact('detail_penjualans'));
    return $pdf->download('detail_penjualans-data.pdf');
})->name('detail_penjualans.pdf');
