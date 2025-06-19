@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2">Welcome, Admin!</h1>
    </div>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <!-- View Orders Card -->
        <a href="{{ route('admin.orders') }}" class="card bg-base-100 shadow-xl transition transform hover:scale-105 hover:shadow-2xl cursor-pointer">
            <div class="card-body text-center items-center">
                <div class="text-5xl">📦</div>
                <h2 class="card-title text-lg mt-2 flex items-center justify-center gap-2">
                    View Orders
                    <span class="badge badge-warning">{{ $ordersCount }}</span>
                </h2>
                <p class="text-sm text-gray-500">Pending order{{ $ordersCount === 1 ? '' : 's' }}</p>
            </div>
        </a>

        <!-- Total Sales Card -->
        <div class="card bg-base-100 shadow-xl text-center p-4">
            <div class="text-5xl">📈</div>
            <h2 class="text-lg mt-2 flex items-center justify-center gap-2">
                Total Sales
                <span class="badge badge-success">{{ $salesCount }}</span>
            </h2>
            <p class="text-sm text-gray-500">Number of accepted orders</p>
        </div>

        <!-- Total Revenue Card -->
        <div class="card bg-base-100 shadow-xl text-center p-4">
            <div class="text-5xl">💰</div>
            <h2 class="text-lg mt-2 flex items-center justify-center gap-2">
                Total Revenue
                <span class="badge badge-info">₱{{ number_format($totalRevenue, 2) }}</span>
            </h2>
            <p class="text-sm text-gray-500">From accepted orders</p>
        </div>
    </div>

     <!-- 🔴 Out of Stock Products Section -->
            @if($outOfStockProducts->count())
                <div class="mb-10">
                    <h2 class="text-xl font-bold text-red-600 mb-4">🚫 Out of Stock Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($outOfStockProducts as $product)
                            <div class="border border-red-400 bg-red-50 p-4 rounded-lg shadow">
                                <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                <p class="text-sm text-gray-700">Price: ₱{{ number_format($product->price, 2) }}</p>
                                <p class="text-sm text-gray-700">Supplier: {{ $product->supplier->name ?? 'N/A' }}</p>
                                <span class="badge badge-error mt-2">Out of Stock</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <!-- 📊 Monthly Sales Chart -->
        <div class="bg-white p-6 rounded-lg shadow mb-10">
            <h2 class="text-xl font-bold mb-4">📊 Monthly Sales</h2>
            <div>{!! $salesChart->container() !!}</div>
        </div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            {!! $salesChart->script() !!}
        @endpush


       
@endsection
