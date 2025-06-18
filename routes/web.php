<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductSuppliersController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;

// 🔐 Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔁 Redirect root based on role
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.products');
    }
    return redirect()->route('login');
})->name('home.index');

// ✅ Admin-only route
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/product-suppliers', [ProductSuppliersController::class, 'prodSupply'])->name('prodSupply.supp');
    Route::get('/product-categories', [ProductCategoryController::class, 'prodCategory'])->name('product-categories.category');
});

// ✅ User-only route
Route::middleware(['auth', IsUser::class])->group(function () {
    Route::get('/products', [UserController::class, 'orderPage'])->name('user.products');
    Route::post('/place-order', [UserController::class, 'placeOrder'])->name('orders.place');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
