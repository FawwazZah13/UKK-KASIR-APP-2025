<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembeliansController;

Route::get('/', function () {
    return view('login');
})->name('login');

// Route::get('/login', [UsersController::class, 'login'])->name('login.auth');

Route::post('login', [UsersController::class, 'login'])->name('login.auth');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UsersController::class, 'logout'])->name('logout.user');
    Route::get('/produk', [ProduksController::class, 'index'])->name('produk.index');
    // Route::get('/produk/search', [ProdukController::class, 'search'])->name('search.produk');
    Route::get('/pembelian/showProduk', [PembeliansController::class, 'show'])->name('pembelian.show');
    Route::get('/pembelian', [PembeliansController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/{id}/unduh-pdf', [PembeliansController::class, 'unduhPdf'])->name('unduhPdf.pembelian');
    Route::get('/export/pembelian', [PembeliansController::class, 'export'])->name('excel.pembelian');
    Route::get('/filter', [PembeliansController::class, 'filter'])->name('pembelian.filter');
    Route::get('/filter/pick', [PembeliansController::class, 'filterPick'])->name('pembelian.filterPick');

});


Route::middleware(['auth', 'role:admin'])->group(function () {

    // ROUTE DATA USER
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users/new', [UsersController::class, 'store'])->name('users.new');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{id}', [UsersController::class, 'destroy'])->name('users.delete');

    // ROUTE PRODUK
// Route::get('/produk', [ProduksController::class, 'index'])->name('index.produk');
Route::get('/produk/create', [ProduksController::class, 'create'])->name('produk.create');
Route::post('/produk/new', [ProduksController::class, 'store'])->name('produk.new');
Route::get('/produk/edit/{id}', [ProduksController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [ProduksController::class, 'update'])->name('produk.update');
Route::get('/produk/updateStokProduk/{id}', [ProduksController::class, 'updateStok'])->name('produk.updateStok');
Route::put('/produk/updateStok/{id}', [ProduksController::class, 'updateStokProduk'])->name('produk.updateStokProduk');
Route::delete('/produk/delete/{id}', [ProduksController::class, 'destroy'])->name('produk.delete');

});

Route::middleware(['auth', 'role:petugas'])->group(function () {

    //ROUTE PEMBELIAN
    Route::post('/pembelian/cart', [PembeliansController::class, 'cart'])->name('pembelian.cart');
Route::get('/pembelian/checkout', [PembeliansController::class, 'checkout'])->name('pembelian.checkout');
Route::post('/pembelian/post', [PembeliansController::class, 'store'])->name('pembelian.post');

Route::get('/create/pembelian', [PembeliansController::class, 'create'])->name('create.pembelian');
Route::get('/detail/{id}', [PembeliansController::class, 'detail'])->name('detail.pembelian');

});
