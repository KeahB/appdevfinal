<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
  @extends('layouts.app')

@section('content')
  @foreach($prod as $product)
    <div class="text-2xl font-semibold mb-4">📊 Dashboard</div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="stat bg-primary text-primary-content">
            <div class="stat-title">Categories {{ $product->supplier->name ?? 'N/A' }}</div>
            <div class="stat-value">12</div>
        </div>
        <div class="stat bg-secondary text-secondary-content">
            <div class="stat-title">Suppliers  {{ $product->supplier->name ?? 'N/A' }}</div>
            <div class="stat-value">5</div>
        </div>
        <div class="stat bg-accent text-accent-content">
            <div class="stat-title">Users</div>
            <div class="stat-value">34</div>
        </div>
    </div>
    @endforeach
    {{-- @foreach($prod as $product)
    <div class="bg-white shadow-md rounded-lg p-4">
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
        
        <h2 class="text-xl font-semibold mt-2">{{ $product->name }}</h2>
        <p class="text-gray-700">₱{{ number_format($product->price, 2) }}</p>
        <p class="text-sm text-gray-500">Qty: {{ $product->quantity }}</p>
        
        <p class="text-sm text-gray-600">Category: {{ $product->category->title ?? 'N/A' }}</p>
        <p class="text-sm text-gray-600">Supplier: {{ $product->supplier->name ?? 'N/A' }}</p>
    </div>
  @endforeach --}}
    
@endsection

     
</div>
</body>
</html>