<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
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
    Route::get('products-single/{id}', 'singleview')->name("product.single");
    Route::get('add-product', 'index')->name("product.add");
    Route::get('upload-image', 'upload_image')->name("upload.image");

    Route::get('product-update', 'productUpdate')->name("product.update");

});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category-add', 'addcategory')->name("category.add");
    Route::get('index-category', 'addcategory')->name("category.index");
    Route::get('category-view', 'viewcategory')->name("category.view");
    Route::post('category-create', 'store')->name("category.store");
    // subcategory
    Route::get('sub-category-add', 'addsub')->name("sub.add");
    Route::get('sub-category-view', 'viewsub')->name("sub.view");
    Route::post('sub-category-create', 'storesub')->name("sub.store");

});

Route::controller(OrderController::class)->group(function () {
    Route::get('All-Orders', 'index')->name("all.orders");
    Route::get('cancelled-orders', 'cancelledOrders')->name("cancelled.orders");
    Route::get('pending-orders', 'pendingOrders')->name("pending.orders");
    Route::get('completed-orders', 'completedOrders')->name("completed.orders");
});

Route::controller(BrandController::class)->group(function () {
    Route::get('brand-add', 'addbrand')->name("brand.add");
    Route::get('brand-view', 'viewbrand')->name("brand.view");
    Route::get('index-brand', 'addbrand')->name("brand.index");
    Route::post('brand-create', 'store')->name("brand.store");
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index')->name("view.user");
    Route::get('create-user', 'create')->name("create.user");
    Route::Post('store-user', 'store')->name("store.user");
    Route::get('edit-user/{id}', 'edit')->name("edit.user");
    Route::post('update-user', 'update')->name("update.user");
    Route::get('single-user/{id}', 'viewUser')->name("user.single");
});

Route::get('dropzone', [App\Http\Controllers\DropzoneController::class, 'dropzone']);
Route::Post('dropzone-store', [App\Http\Controllers\DropzoneController::class, 'dropzoneStore'])->name('droppzone.store');
Route::Post('dropzone-store-image', [App\Http\Controllers\DropzoneController::class, 'dropzoneStoreProductImage'])->name('droppzone.pstore');
Route::Post('dropzone-update', [App\Http\Controllers\DropzoneController::class, 'dropzoneUpdate'])->name('droppzone.update');







Route::get('maintenance', [App\Http\Controllers\HomeController::class, 'maintenance'])->name('maintenance');

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');






