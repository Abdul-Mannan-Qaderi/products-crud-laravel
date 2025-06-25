<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/deleted/', [ProductController::class, 'deleted_products'])->name('products.deleted');
Route::get('/products/create/', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store/', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::put('/deleted-products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');

Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/deleted-products/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');

//  for categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
