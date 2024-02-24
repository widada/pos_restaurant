<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\PromoAController;
use App\Http\Controllers\TryController;
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
    
    Route::middleware(['userAkses:user'])->group(function () {
        Route::get('/user/user', [UserController::class, 'user']);
        Route::get('/user/meja', [UserController::class, 'user']);
        Route::get('/user/orderan', [UserController::class, 'user']);
        
        Route::get('/user/admin', [UserController::class, 'admin']);
        
        Route::get('/logout', [SesiController::class, 'logout']);
        
        Route::resource('/user/kategori', CategoryController::class );

        // Route::post('/user/kategori', [CategoryController::class, 'simpan'] );

        Route::resource('/user/pengguna', PenggunaController::class );
        Route::resource('/user/menu', ProductController::class );
        Route::resource('/user/promo', PromoController::class );

        Route::resource('/admin/menu', ProductAController::class );
        Route::resource('/admin/promo', PromoAController::class );

    });
});
Route::get('/pdf', [TryController::class, 'index']);

Route::view('tes-layout', 'test-blade.anak');
Route::view('tes-layout1', 'test-blade.anak1');


