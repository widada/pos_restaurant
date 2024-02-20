<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\PromoAController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/user');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/user', [UserController::class, 'user'])->middleware('userAkses:user');
    Route::get('/user/meja', [UserController::class, 'user'])->middleware('userAkses:user');
    Route::get('/user/orderan', [UserController::class, 'user'])->middleware('userAkses:user');
    
    Route::get('/user/admin', [UserController::class, 'admin'])->middleware('userAkses:admin');
    
    Route::get('/logout', [SesiController::class, 'logout']);
    
    Route::resource('/user/kategori', CategoryController::class )->middleware('userAkses:user');
    Route::resource('/user/pengguna', PenggunaController::class )->middleware('userAkses:user');
    Route::resource('/user/menu', ProductController::class )->middleware('userAkses:user');
    Route::resource('/user/promo', PromoController::class )->middleware('userAkses:user');

    Route::resource('/admin/menu', ProductAController::class )->middleware('userAkses:admin');
    Route::resource('/admin/promo', PromoAController::class )->middleware('userAkses:admin');

});


