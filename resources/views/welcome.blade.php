@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
    
    
    <div class="stats shadow bg-white transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
        <div class="stat">
            <div class="stat-figure text-primary">👥</div>
            <div class="stat-title">Users</div>
            <div class="stat-value">3</div>
            <div class="stat-desc text-blue-500">Total of users</div>
        </div>
    </div>

    
    <a href="{{ route('product-categories.category') }}" class="stats shadow bg-white transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer no-underline">
        <div class="stat">
            <div class="stat-figure text-primary">🗂️</div>
            <div class="stat-title">Product Categories</div>
            <div class="stat-value">{{ $totalCategories }}</div>
            <div class="stat-desc text-blue-500">Total of categories</div>
        </div>
    </a>

    
    <a href="{{ route('prodSupply.supp') }}" class="stats shadow bg-white transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
        <div class="stat">
            <div class="stat-figure text-primary">🤝</div>
            <div class="stat-title">Product Suppliers</div>
            <div class="stat-value">{{ $totalSuppliers }}</div>
            <div class="stat-desc text-blue-500">Total of suppliers</div>
        </div>
    </a>

   
    <a href="{{ route('products.index') }}" class="stats shadow bg-white transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
        <div class="stat">
            <div class="stat-figure text-primary">📦</div>
            <div class="stat-title">Products</div>
            <div class="stat-value">{{ $totalProducts }}</div>
            <div class="stat-desc text-blue-500">Total of products</div>
        </div>
    </a>

    
    <div class="stats shadow bg-white transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
        <div class="stat">
            <div class="stat-figure text-primary">📋</div>
            <div class="stat-title">Orders</div>
            <div class="stat-value">874</div>
            <div class="stat-desc text-green-500">Total of orders</div>
        </div>
    </div>

    
    <div class="stats shadow bg-white transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer">
        <div class="stat">
            <div class="stat-figure text-error">⚠️</div>
            <div class="stat-title">Lowest Stock</div>
            <div class="stat-value text-error">{{ $lowStockCount }}</div>
            <div class="stat-desc text-red-500">Total of products with low stock</div>
        </div>
    </div>

</div>
@endsection