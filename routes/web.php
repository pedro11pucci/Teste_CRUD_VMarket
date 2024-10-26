<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::view('/', 'home');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
Route::get('/products', [ProductController::class, 'index'])->name('products');