<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSuppliersController;
use App\Http\Controllers\AuthController;

// 🔒 Redirect root to dashboard if logged in
Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware('auth')->name('home.index');

// 🔒 Dashboard - must be authenticated
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// 🔒 Product Suppliers Page
Route::get('/product-suppliers', [ProductSuppliersController::class, 'prodSupply'])
    ->middleware('auth')
    ->name('prodSupply.supp');

// 🔒 Product Categories Page
Route::get('/product-categories', [ProductCategoryController::class, 'prodCategory'])
    ->middleware('auth')
    ->name('product-categories.category');
    
Route::get('/products', [ProductsController::class, 'index'])
    ->middleware('auth')
    ->name('products.index');

// 🔐 Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
