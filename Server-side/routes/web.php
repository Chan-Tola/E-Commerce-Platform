<?php

use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\StaffWebController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// Group of Product Route

// index page
Route::get('/', [ProductWebController::class, 'index'])->name('index');
// create product page
Route::get('/product/create', [ProductWebController::class, 'create'])->name('proCreate');
// store product data to database
Route::post('/product/store', [ProductWebController::class, 'store'])->name('proStore');
// update product page
Route::get('/product/{id}/edit', [ProductWebController::class, 'edit'])->name('proUpdate');
// store update data to database
Route::put('/product/update/{id}', [ProductWebController::class, 'update'])->name('proEdit');
// detele data product from database
Route::delete('/product/delete/{id}', [ProductWebController::class, 'delete'])->name('proDestory');

// group of staff route
// index page
Route::get('/staffs', [StaffWebController::class, 'index'])->name('staffs');
// group of user route
// index page
Route::get('/users',[UserWebController::class, 'index'])->name('users');


// index page
Route::get('/order',function(){
    return view('');
});