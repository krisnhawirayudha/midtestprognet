<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'dashboard'],function(){
    Route::get('/',  [App\Http\Controllers\DashboardController::class,'index']);
    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('order', OrderController::class);
    Route::post('/produkimage', [App\Http\Controllers\ProdukController::class,'uploadimage']);
    Route::delete('/produkimage/{id}', [App\Http\Controllers\ProdukController::class,'deleteimage']);
});