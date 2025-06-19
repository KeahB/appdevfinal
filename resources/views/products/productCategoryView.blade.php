@extends('layouts.app')

@section('title', '')

@section('content')
<div class="p-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Product Categories</h1>
    </div>

    @forelse ($prodCat as $cat)
        <div class="collapse collapse-arrow bg-white shadow-md rounded-box mb-4 border border-gray-200">
            <input type="checkbox" />
            <div class="collapse-title text-xl font-semibold text-gray-800">
                {{ $cat->title }}
                <span class="ml-2 badge badge-info">{{ $cat->slug }}</span>
            </div>
            <div class="collapse-content">
                @if($cat->products->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full mt-2">
                            <thead class="bg-base-200">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cat->products as $product)
                                    <tr>
                                        <td class="font-medium">{{ $product->name }}</td>
                                        <td>₱{{ number_format($product->price, 2) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-gray-500 italic">No products in this category.</div>
                @endif
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 italic mt-10">No product categories found.</div>
    @endforelse
</div>
@endsection
