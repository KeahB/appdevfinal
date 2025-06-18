@extends('layouts.userlayout')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Available Products</h1>

    @if($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="mt-2 font-bold text-blue-600">₱{{ number_format($product->price, 2) }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No products available.</p>
    @endif
@endsection
