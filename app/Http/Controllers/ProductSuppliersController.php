<?php

namespace App\Http\Controllers;

use App\Models\ProductSuppliers;
use Illuminate\Http\Request;

class ProductSuppliersController extends Controller
{
    public function prodSupply(){

        $prodSupp = ProductSuppliers::with('products');

        return view('products.prodSupplyView', compact('prodSupp'));
    }
}
