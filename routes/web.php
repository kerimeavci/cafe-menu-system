<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
});
#start
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
#end
#Authentication start
    Route::get('/login', [App\Http\Controllers\Controller::class, 'login'])->name('login');
    Route::post('/login-post', [App\Http\Controllers\Controller::class, 'login_post'])->name('login_post');
    Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout'])->name('logout');
    Route::get('/register', [App\Http\Controllers\Controller::class, 'register'])->name('register');
    Route::post('/register-post', [App\Http\Controllers\Controller::class, 'register_post'])->name('register_post');
#Authentication end

#Dashboard start
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin_dashboard');
});
Route::prefix('urunler')->group(function () {
    Route::get('urunler', [App\Http\Controllers\Api\ProductController::class, 'index'])->name('products');
    Route::get('urun-ekle', [App\Http\Controllers\Api\ProductController::class, 'create'])->name('product_create');
    Route::post('urun-ekle-post', [App\Http\Controllers\Api\ProductController::class, 'store'])->name('product_store');
    Route::post('urun-düzenle', [App\Http\Controllers\Api\ProductController::class, 'update'])->name('product_edit');
    Route::delete('urun-sil/{id}', [App\Http\Controllers\Api\ProductController::class, 'delete'])->name('delete');
});
Route::prefix('kategori')->group(function () {
    Route::get('kategoriler', [App\Http\Controllers\Api\CategoryController::class, 'index'])->name('categories');
    Route::get('kategori-ekle', [App\Http\Controllers\Api\CategoryController::class, 'create'])->name('categories_create');
    Route::post('kategori-ekle-post', [App\Http\Controllers\Api\CategoryController::class, 'store'])->name('categories_store');
    Route::post('kategori-düzenle', [App\Http\Controllers\Api\CategoryController::class, 'update'])->name('categories_edit');
    Route::delete('kategori-sil/{id}', [App\Http\Controllers\Api\CategoryController::class, 'delete'])->name('categories_delete');
});
#Dashboard end
#$user_name =Auth::user();
#Route::get($user_name.'/categories/product',[])
Route::middleware(['auth'])->group(function () {
    Route::get('{user_name}/categories', [App\Http\Controllers\Api\CategoryController::class, 'index'])
        ->name('user.categories');

    Route::get('{user_name}/categories/{category_slug}/products', [App\Http\Controllers\Api\CategoryController::class, 'products'])
        ->name('user.category.products');
});


