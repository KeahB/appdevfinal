@extends('layouts.app')

@section('title', 'Product Suppliers')

@section('content')
<div class="p-4">
    <h1 class="text-2xl font-bold mb-6">Product Suppliers</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($prodSupp as $supplier)
            <div class="card bg-base-100 shadow-lg border border-base-200 hover:shadow-xl transition-all duration-200">
                <div class="card-body">
                    <div class="flex items-center justify-between">
                        <h2 class="card-title text-lg md:text-xl">{{ $supplier->name }}</h2>
                        <span class="badge badge-outline badge-primary text-xs md:text-sm">Supplier</span>
                    </div>
                    <p class="text-sm text-gray-600 break-all">
                        📧 {{ $supplier->email }}<br>
                        📞 {{ $supplier->phone }}
                    </p>

                    <div class="mt-4">
                        <h3 class="font-semibold mb-2 text-sm text-gray-700">Products</h3>
                        @if($supplier->products->count())
                            <ul class="space-y-2 max-h-48 overflow-y-auto">
                                @foreach($supplier->products as $product)
                                    <li class="p-2 bg-gray-100 rounded-md">
                                        <div class="flex justify-between items-center">
                                            <span class="font-medium">{{ $product->name }}</span>
                                            <span class="text-sm text-green-600 font-semibold">
                                                ₱{{ number_format($product->price, 2) }}
                                            </span>
                                        </div>
                                        <p class="text-xs text-gray-500">Quantity: {{ $product->quantity }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-400 italic">No products available.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
