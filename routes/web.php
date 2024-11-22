<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BarangController;  

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
    return view('home');
})->name('home');

Route::prefix('/barang')->name('barang.')->group(function(){
    Route::get('/add', [BarangController::class, 'create'])->name('create');
    Route::get('/', [BarangController::class, 'index'])->name('home');
    Route::get('/edit/{id}', [BarangController::class, 'edit'])->name('edit');
    Route::post('/add', [BarangController::class, 'store'])->name('store');
    Route::get('/stock', [BarangController::class, 'stock'])->name('stock');
    Route::patch('/edit/{id}', [BarangController::class, 'update'])->name('update');
    Route::get('/index', [BarangController::class, 'index'])->name('index');
    Route::delete('/delete/{id}', [BarangController::class, 'destroy'])->name('delete');

});

Route::resource('order', OrderController::class);
Route::resource('user', UserController::class);
Route::get('/logout', function () {
    return redirect('/');
})->name('logout');
