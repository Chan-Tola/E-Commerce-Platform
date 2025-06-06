<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Your working API route
Route::get('products', [ProductController::class, 'index']);
// api route by id
Route::get('product/{id}',[ProductController::class,'show']);