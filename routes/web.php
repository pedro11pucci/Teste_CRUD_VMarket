<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::view('/', 'home');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
Route::get('/suppliers/create', [SupplierController::class,'create'])->name('suppliers/create');
Route::post('/suppliers/store', [SupplierController::class, 'store'])->name('suppliers/store');
Route::get('/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers/edit');
Route::put('/suppliers/{id}', [SupplierController::class,'update'])->name('suppliers/update');

Route::get('/products', [ProductController::class, 'index'])->name('products');
