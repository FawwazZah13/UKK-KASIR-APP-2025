<?php

use App\Http\Controllers\PembeliansController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard');
// });

//ROUTE USER
Route::get('/dashboard', function(){
    return view('dashboard');
});

//ROUTE USERS
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users/new', [UsersController::class, 'store'])->name('users.new');
Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');

//ROUTE PRODUK
Route::get('/produk', [ProduksController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProduksController::class, 'create'])->name('produk.create');
Route::post('/produk/new', [ProduksController::class, 'store'])->name('produk.new');
Route::get('/produk/edit/{id}', [ProduksController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [ProduksController::class, 'update'])->name('produk.update');
Route::get('/produk/updateStokProduk/{id}', [ProduksController::class, 'updateStok'])->name('produk.updateStok');
Route::put('/produk/updateStok/{id}', [ProduksController::class, 'updateStokProduk'])->name('produk.updateStokProduk');
Route::delete('/produk/delete/{id}', [ProduksController::class, 'destroy'])->name('produk.delete');

//ROUTE PEMBELIAN
Route::get('/pembelian', [PembeliansController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/showProduk', [PembeliansController::class, 'show'])->name('pembelian.show');
Route::post('/pembelian/cart', [PembeliansController::class, 'cart'])->name('pembelian.cart');
// Route::get('/pembelian/create', [PembeliansController::class, 'create'])->name('pembelian.create');
// Route::post('/produk/new', [ProduksController::class, 'store'])->name('produk.new');
// Route::get('/produk/edit/{id}', [ProduksController::class, 'edit'])->name('produk.edit');
// Route::put('/produk/update/{id}', [ProduksController::class, 'update'])->name('produk.update');
// Route::get('/produk/updateStokProduk/{id}', [ProduksController::class, 'updateStok'])->name('produk.updateStok');
// Route::put('/produk/updateStok/{id}', [ProduksController::class, 'updateStokProduk'])->name('produk.updateStokProduk');
// Route::delete('/produk/delete/{id}', [ProduksController::class, 'destroy'])->name('produk.delete');
