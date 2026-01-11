<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Product CRUD routes
Route::get('/products', [productcontroller::class, 'index'])->name('products.index');
Route::get('/products/create', [productcontroller::class, 'create'])->name('products.create');
Route::post('/products', [productcontroller::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [productcontroller::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [productcontroller::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [productcontroller::class, 'destroy'])->name('products.destroy');
