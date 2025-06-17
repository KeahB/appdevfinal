<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSuppliersController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductsController::class, 'index'])->name('home.index');

Route::get('/product-categories', [ProductCategoryController::class, 'prodCategory'])->name('product-categories.category');
Route::get('/product-suppliers', [ProductSuppliersController::class, 'prodSupply'])->name('prodSupply.supp');
Route::get('/products', [ProductsController::class, 'prod'])->name('products.index');
