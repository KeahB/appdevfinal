<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSuppliers;

class ProductsController extends Controller
{
        public function index()
    {
        return view('welcome', [
            'totalCategories' => ProductCategory::count(),
            'totalSuppliers' => ProductSuppliers::count(),
            'totalProducts' => Products::count(),
           
            'lowStockCount' => Products::where('quantity', '<', 5)->count(),
        ]);
    }
    public function prod()
    {
        $products = Products::all(); // add `with()` if you need related models
        return view('products.productView', compact('products'));
    }

}
