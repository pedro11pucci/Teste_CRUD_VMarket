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
Route::delete('/suppliers/delete', [SupplierController::class, 'destroy'])->name('suppliers/delete');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class,'create'])->name('products/create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products/store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products/edit');
Route::put('/products/{id}', [ProductController::class,'update'])->name('products/update');
Route::delete('/products/delete', [ProductController::class, 'destroy'])->name('products/delete');
