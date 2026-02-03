<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController; //untuk produk

Route::get('/', function () {
    return view('index'); 
});
Route::get('/owner', [ProdukController::class, 'index'])->name('produk.index');
Route::post('/owner/store', [ProdukController::class, 'store'])->name('produk.store');
Route::post('/owner/scan', [ProdukController::class, 'scan'])->name('produk.scan');