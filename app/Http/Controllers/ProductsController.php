<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){

        $prod = Products::with(['category', 'supplier'])->get();

        return view('welcome', compact('prod'));

    }
}
