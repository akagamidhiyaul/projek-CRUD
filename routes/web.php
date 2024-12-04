<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;  
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('/barang')->name('barang.')->group(function(){
    Route::get('/add', [BarangController::class, 'create'])->name('create');
    Route::get('/', [BarangController::class, 'index'])->name('home');
    Route::get('/edit/{id}', [BarangController::class, 'edit'])->name('edit');
    Route::post('/add', [BarangController::class, 'store'])->name('store');
    Route::get('/stock', [BarangController::class, 'stock'])->name('stock');
    Route::patch('/edit/{id}', [BarangController::class, 'update'])->name('update');
    Route::get('/index', [BarangController::class, 'index'])->name('index');
    Route::delete('/delete/{id}', [BarangController::class, 'destroy'])->name('delete');
    Route::get('/stockEdit/{id}/edit', [BarangController::class, 'stockEdit'])->name('stock.edit');
    Route::put('/updateStock/{id}', [BarangController::class, 'updateStock'])->name('update.stock');
});

Route::prefix('/users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/add', [UserController::class, 'create'])->name('create');
    Route::post('/add', [UserController::class, 'store'])->name('store');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('/edit/{id}', [UserController::class, 'update'])->name('update');
    
});

Route::prefix('/order')->name('orders.')->group(function(){
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::get('/store', [OrderController::class, 'store'])->name('store');
});

// Route::resource('order', OrderController::class);
Route::resource('user', UserController::class);
Route::get('/logout', function () {
    return redirect('/');
})->name('logout');
