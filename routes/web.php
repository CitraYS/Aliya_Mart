<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController; //untuk produk

Route::get('/', function () {
    return view('index'); 
})->name('home.index');


/*Route::get('/owner', [ProdukController::class, 'index'])->name('produk.index');
Route::post('/owner/store', [ProdukController::class, 'store'])->name('produk.store');
Route::post('/owner/scan', [ProdukController::class, 'scan'])->name('produk.scan');
Route::delete('/owner/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
Route::put('/owner/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
*/

Route::get('/owner/login', [ProdukController::class, 'showLogin'])->name('owner.login');
Route::post('/owner/login', [ProdukController::class, 'auth'])->name('owner.auth');
Route::get('/owner/logout', [ProdukController::class, 'logout'])->name('owner.logout');

// Route Produk (Hanya bisa diakses jika sudah login)
Route::middleware(['owner.auth'])->group(function () {
    Route::get('/owner', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/owner/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/owner/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/owner/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::post('/owner/scan', [ProdukController::class, 'scan'])->name('produk.scan');
});

// 1 kali panggil saja, untuk isi data supabase
Route::get('/jalankan-migrasi', function () {
    Artisan::call('migrate:fresh --force');
    return "Database Berhasil Dimigrasi!";
});