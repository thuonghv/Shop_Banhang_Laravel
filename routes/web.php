<?php

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
/*
Route::get('/','HomeController@index');
Route::get('/trang chu', function () {
    return view('layout');
});*/
//frontend
Route::get('/trang chu', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//backend
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('login_admin');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'show_dashboard'])->name('admin_layout');
Route::post('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin_layout');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin_layout');

//category product
Route::get('/add-category-product', [App\Http\Controllers\CategoryProduct::class, 'add_category_product'])->name('admin_layout');
Route::get('/all-category-product', [App\Http\Controllers\CategoryProduct::class, 'all_category_product'])->name('admin_layout');
Route::post('/save-category-product', [App\Http\Controllers\CategoryProduct::class, 'save_category_product'])->name('admin_layout');

Route::get('/unactive-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'unactive_category_product'])->name('admin_layout');
Route::get('/active-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'active_category_product'])->name('admin_layout');