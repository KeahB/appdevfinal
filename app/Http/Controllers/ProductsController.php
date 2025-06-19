<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductCategory;
use App\Models\ProductSuppliers;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('supplier', 'category')->get();
        $suppliers = ProductSuppliers::all();
        $categories = ProductCategory::all();
        return view('admin.products.index', compact('products', 'suppliers', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'quantity'     => 'required|integer',
            'supplier_id'  => 'nullable|exists:product_suppliers,id',
            'category_id'  => 'nullable|exists:product_categories,id'
        ]);

        Products::create($request->all());
        return back()->with('success', 'Product added successfully.');
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string',
            'price'        => 'required|numeric',
            'quantity'     => 'required|integer',
            'supplier_id'  => 'nullable|exists:product_suppliers,id',
            'category_id'  => 'nullable|exists:product_categories,id'
        ]);

        $product->update($request->all());
        return back()->with('success', 'Product updated successfully.');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }

    public function edit(Products $product)
    {
        $suppliers = ProductSuppliers::all();
        $categories = ProductCategory::all();
        return view('admin.products.edit', compact('product', 'suppliers', 'categories'));
    }

    // Optional: for user-side product listing
    public function prod()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }
}
