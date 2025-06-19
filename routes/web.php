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
    Route::get('/product-suppliers', [ProductSuppliersController::class, 'prodSupply'])->name('prodSupply.supp');
    Route::get('/product-categories', [ProductCategoryController::class, 'prodCategory'])->name('product-categories.category');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/products', [ProductsController::class, 'index'])->name('products.index');
    Route::post('/admin/products', [ProductsController::class, 'store'])->name('products.store');
    Route::put('/admin/products/{product}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/admin/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::get('/admin/orders', [OrderController::class, 'adminViewOrders'])->name('admin.orders');
    Route::put('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');


    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::put('/admin/notifications/{id}/read', function ($id) {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return back();
    })->name('notifications.markAsRead');
});

// ✅ User-only route
    Route::middleware(['auth', IsUser::class])->group(function () {
    Route::get('/products', [UserController::class, 'orderPage'])->name('user.products');
    Route::post('/orders/place', [OrderController::class, 'placeOrder'])->name('orders.place');
    Route::get('/user/orders', [OrderController::class, 'index'])->name('orders.index');


    // Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
