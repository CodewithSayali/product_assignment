<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products-list', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

Route::post('/cart', [CartController::class, 'addToCart']);
Route::get('/cart-view', [CartController::class, 'viewCart']);
