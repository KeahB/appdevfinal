<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */public function index()
    {
    $products = Products::all(); // Fetch all products from the database
    return view('admin.dashboard', compact('products'));
    }
}
