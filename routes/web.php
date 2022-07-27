<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Routing\Route;
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
Route::resource('product', ProductController::class);
Route::controller(ProductController::class)->group(function () {
    Route::get('products', 'view')->name("product.view");
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category-add', 'addcategory')->name("category.add");
    Route::get('category-view', 'viewcategory')->name("category.view");
    Route::post('category-create', 'store')->name("category.store");

    // subcategory
    Route::post('sub-category-create', 'store')->name("sub-category.store");
});

Route::controller(OrderController::class)->group(function () {
    Route::get('All-Orders', 'addcategory')->name("category.add");
    Route::get('cancelled-orders', 'viewcategory')->name("category.view");
    Route::get('pending-orders', 'viewcategory')->name("category.view");
    Route::get('completed-orders', 'viewcategory')->name("category.view");
});

















Route::get('maintenance', [App\Http\Controllers\HomeController::class, 'maintenance'])->name('maintenance');

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');






