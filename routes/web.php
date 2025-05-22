<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::resource('products', ProductController::class);
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::put('cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');