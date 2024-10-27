<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;

Route::view('/', 'home');

Route::prefix('suppliers')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('suppliers');
    Route::get('/create', [SupplierController::class, 'create'])->name('suppliers/create');
    Route::post('/store', [SupplierController::class, 'store'])->name('suppliers/store');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers/edit');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('suppliers/update');
    Route::delete('/delete', [SupplierController::class, 'destroy'])->name('suppliers/delete');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products');
    Route::get('/create', [ProductController::class, 'create'])->name('products/create');
    Route::post('/store', [ProductController::class, 'store'])->name('products/store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products/edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products/update');
    Route::delete('/delete', [ProductController::class, 'destroy'])->name('products/delete');
});
