<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MenuController::class, 'index'])->name('menu.index');

Route::get('/menu/{product}', [MenuController::class, 'show'])->name('menu.show');
