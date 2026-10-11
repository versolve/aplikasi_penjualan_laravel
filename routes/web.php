<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
// Route::get('/produk', function () {
//     return view('produk');
// });
Route::get('/produk', [ProdukController::class, 'ViewProduk']);
Route::get('/produk/tambah', [ProdukController::class, 'FormTambahProduk']);
Route::post('/produk/tambah', [ProdukController::class, 'CreateProduk']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'FormEditProduk']);
Route::put('/produk/edit/{id}', [ProdukController::class, 'UpdateProduk']);
Route::delete('/produk/delete/{id}', [ProdukController::class, 'DeleteProduk']);

Route::get('/penjualan', function () {
    return view('penjualan');
});
Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/pengaturan', function () {
    return view('pengaturan');
});
