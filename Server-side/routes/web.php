<?php

use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\StaffWebController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// root page
Route::get('/', [ProductWebController::class, 'index'])->name('products.index');
// fm input data page
Route::get('/product/create', [ProductWebController::class, 'create'])->name('products.create');
// store data from fm to database
Route::post('/product/store', [ProductWebController::class, 'store'])->name('/product/create');

// open fm for update  data
Route::get('/product/{id}/edit', [ProductWebController::class, 'edit'])->name('products.update');
// updated data from fm to database
Route::put('/product/update/{id}', [ProductWebController::class, 'update'])->name('products.edit');

// detele data
Route::delete('/product/delete/{id}', [ProductWebController::class, 'delete']);

// staff Route 
Route::get('/staffs', [StaffWebController::class, 'index'])->name('admin.staffs');
// User Route
Route::get('/users',[UserWebController::class, 'index'])->name('admin.users');