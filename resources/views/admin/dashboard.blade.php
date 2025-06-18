@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="p-4 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Welcome, Admin!</h1>
    <p class="text-gray-600">You are now viewing the admin dashboard.</p>
</div>
<div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="#add_product_modal" class="btn btn-primary">Add New Product</a>
    </div>
            
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="table w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th></th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td><input type="checkbox" class="checkbox" /></td>
                    <td><img src="{{ asset('images/' . $product->image) }}" class="w-12 h-12 object-cover rounded" alt="{{ $product->name }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>
                        <span class="badge badge-info text-white">{{ $product->quantity }}</span>
                    </td>
                    <td class="text-center space-x-2">
                        <a href="#" class="text-green-600 hover:underline">Edit</a>
                        <a href="#" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
