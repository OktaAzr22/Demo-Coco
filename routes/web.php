<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('kategori', KategoriController::class);
Route::resource('produk', ProdukController::class);
Route::resource('pesanan', PesananController::class);
Route::get('/riwayat-pesanan', [PesananController::class, 'riwayat'])->name('pesanan.riwayat');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');