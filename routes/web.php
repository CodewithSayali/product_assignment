<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/dashboard', [CartController::class, 'viewCart'])->name('dashboard');

