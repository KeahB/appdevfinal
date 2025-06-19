<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Order;   
use App\Models\ProductSuppliers;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use App\Charts\SalesChart; // Add this line if SalesChart exists in App\Charts namespace

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
{
    $notifications = Auth::user()->unreadNotifications;
    $productCount = Products::count();
    $supplierCount = ProductSuppliers::count();
    $categoryCount = ProductCategory::count();
    $outOfStockProducts = Products::with('supplier')->where('quantity', 0)->get();

    $ordersCount = \App\Models\Order::where('status', 'pending')->count();
    $salesCount = \App\Models\Order::where('status', 'accepted')->count();
    $totalRevenue = \App\Models\Order::where('status', 'accepted')->sum('total_price');

    $salesChart = new SalesChart();

    return view('admin.dashboard', compact(
        'notifications', 'productCount', 'supplierCount', 'categoryCount',
        'outOfStockProducts', 'ordersCount', 'salesCount', 'totalRevenue',
        'salesChart'
    ));
}
}
