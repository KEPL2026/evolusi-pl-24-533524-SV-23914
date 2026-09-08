<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MenuController::class, 'index'])->name('menu.index');

Route::get('/menu/{product}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');

Route::post('/keranjang/{product}', [CartController::class, 'add'])->name('cart.add');

Route::put('/keranjang/{product}', [CartController::class, 'update'])->name('cart.update');

Route::delete('/keranjang/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'create'])
    ->name('checkout.create');

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/checkout/sukses/{order}', [CheckoutController::class, 'success'])
    ->name('checkout.success');
