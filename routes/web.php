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

//danh muc trang chu
Route::get('/danh-muc/{category_id}', [App\Http\Controllers\CategoryProduct::class, 'show_category_home'])->name('home');
Route::get('/thuong-hieu/{brand_id}', [App\Http\Controllers\BrandProduct::class, 'show_brand_home'])->name('home');
Route::get('/chi-tiet-san-pham/{product_id}', [App\Http\Controllers\ProductController::class, 'details_product'])->name('home');

//backend
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('login_admin');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'show_dashboard'])->name('admin_layout');
Route::post('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin_layout');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin_layout');

//category product
Route::get('/add-category-product', [App\Http\Controllers\CategoryProduct::class, 'add_category_product'])->name('admin_layout');
Route::get('/edit-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'edit_category_product'])->name('admin_layout');
Route::get('/delete-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'delete_category_product'])->name('admin_layout');
Route::get('/all-category-product', [App\Http\Controllers\CategoryProduct::class, 'all_category_product'])->name('admin_layout');
Route::post('/save-category-product', [App\Http\Controllers\CategoryProduct::class, 'save_category_product'])->name('admin_layout');

Route::get('/unactive-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'unactive_category_product'])->name('admin_layout');
Route::get('/active-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'active_category_product'])->name('admin_layout');
Route::post('/update-category-product/{category_product_id}', [App\Http\Controllers\CategoryProduct::class, 'update_category_product'])->name('admin_layout');

//brand product
Route::get('/add-brand-product', [App\Http\Controllers\BrandProduct::class, 'add_brand_product'])->name('admin_layout');
Route::get('/edit-brand-product/{brand_product_id}', [App\Http\Controllers\BrandProduct::class, 'edit_brand_product'])->name('admin_layout');
Route::get('/delete-brand-product/{brand_product_id}', [App\Http\Controllers\BrandProduct::class, 'delete_brand_product'])->name('admin_layout');
Route::get('/all-brand-product', [App\Http\Controllers\BrandProduct::class, 'all_brand_product'])->name('admin_layout');
Route::post('/save-brand-product', [App\Http\Controllers\BrandProduct::class, 'save_brand_product'])->name('admin_layout');

Route::get('/unactive-brand-product/{brand_product_id}', [App\Http\Controllers\BrandProduct::class, 'unactive_brand_product'])->name('admin_layout');
Route::get('/active-brand-product/{brand_product_id}', [App\Http\Controllers\BrandProduct::class, 'active_brand_product'])->name('admin_layout');
Route::post('/update-brand-product/{brand_product_id}', [App\Http\Controllers\BrandProduct::class, 'update_brand_product'])->name('admin_layout');
//product
Route::get('/add-product', [App\Http\Controllers\ProductController::class, 'add_product'])->name('admin_layout');
Route::get('/edit-product/{product_id}', [App\Http\Controllers\ProductController::class, 'edit_product'])->name('admin_layout');
Route::get('/delete-product/{product_id}', [App\Http\Controllers\ProductController::class, 'delete_product'])->name('admin_layout');
Route::get('/all-product', [App\Http\Controllers\ProductController::class, 'all_product'])->name('admin_layout');
Route::post('/save-product', [App\Http\Controllers\ProductController::class, 'save_product'])->name('admin_layout');

Route::get('/unactive-product/{product_id}', [App\Http\Controllers\ProductController::class, 'unactive_product'])->name('admin_layout');
Route::get('/active-product/{product_id}', [App\Http\Controllers\ProductController::class, 'active_product'])->name('admin_layout');
Route::post('/update-product/{product_id}', [App\Http\Controllers\ProductController::class, 'update_product'])->name('admin_layout');