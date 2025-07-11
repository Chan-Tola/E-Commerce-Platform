<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// // http://localhost:8000/api/products
// Your working API route
Route::get('products', [ProductController::class, 'index']);
// // http://localhost:8000/api/products/{id}
Route::get('product/{id}', [ProductController::class, 'show']);
// http://localhost:8000/api/register
// route create user
Route::post('/register', [AuthController::class, 'register']);