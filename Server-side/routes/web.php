<?php

use App\Http\Controllers\OrderWebController;
use App\Http\Controllers\ProductDetailWebController;
use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\StaffWebController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Group of Product Route

// index page
Route::controller(ProductWebController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/product/create', 'create')->name('product.create');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/product/{id}/edit', 'edit')->name('product.edit');
    Route::put('/product/update/{id}', 'update')->name('product.update');
    Route::delete('/product/delete/{id}', 'delete')->name('product.delete');
});
// Product detail routes grouped by controller
Route::controller(ProductDetailWebController::class)->group(function () {
    Route::get('/productdetail', 'index')->name('productdetail.index');
    Route::get('/productdetail/create', 'create')->name('productdetail.create');
    Route::post('/productdetail/store', 'store')->name('productdetail.store');
    Route::get('/productdetail/edit/{id}', 'edit')->name('productdetail.edit');
    Route::put('/productdetail/update/{id}', 'update')->name('productdetail.update');
    Route::get('/productdetail/delete/{id}', 'delete')->name('productdetail.delete');
    Route::delete('/productdetail/destroy/{id}', 'destroy')->name('productdetail.destory');
});

Route::get('/staffs', [StaffWebController::class, 'index'])->name('staffs');
Route::get('/users', [UserWebController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserWebController::class, 'create'])->name('user.create');
Route::get('/orders', [OrderWebController::class, 'index'])->name('orders');