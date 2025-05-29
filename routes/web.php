<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', fn() => redirect()->route('products.index'));

Route::resource('products', ProductController::class)
    ->only(['index', 'show']);

Route::resource('cart', CartController::class)
    ->only(['index', 'store', 'update', 'destroy']);