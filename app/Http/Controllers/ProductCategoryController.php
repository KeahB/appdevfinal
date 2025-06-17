<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function prodCategory()
    {
        $prodCat = ProductCategory::with('products')->get();

        return view('products.productCategoryView', compact('prodCat'));
    }
}
