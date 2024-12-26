<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


#ApiResource start
Route::prefix('kategori')->group(function () {
    Route::apiResource('category', App\Http\Controllers\Api\CategoryController::class);
    Route::get('kategoriler', [App\Http\Controllers\Api\CategoryController::class, 'index'])->name('categories');
});

Route::prefix('ürünler')->group(function () {
    Route::apiResource('products', App\Http\Controllers\Api\ProductController::class);
    Route::get('ürünler', [App\Http\Controllers\Api\ProductController::class, 'products'])->name('product');
    //Route::post('ürün-ekle', [App\Http\Controllers\Api\ProductController::class, 'create'])->name('product_create');
    //Route::post('ürün-düzenle', [App\Http\Controllers\Api\ProductController::class, 'edit'])->name('product_edit');
    //Route::delete('ürün-sil/{id}', [App\Http\Controllers\Api\ProductController::class, 'delete'])->name('delete');
});
#ApiResource end
