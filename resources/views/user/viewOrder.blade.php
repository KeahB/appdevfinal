@extends('layouts.userlayout')

@section('title', '')

@section('content')
<h1 class="text-3xl font-bold mb-6">📦 My Orders</h1>

@if($orders->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($orders as $order)
            <div class="card bg-white shadow-md">
                <figure class="h-40 overflow-hidden">
                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}" class="w-full object-cover">
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $order->product->name }}</h2>
                    <p class="text-sm">Quantity: <strong>{{ $order->quantity }}</strong></p>
                    <p class="text-sm">Total: <span class="text-blue-600 font-semibold">₱{{ number_format($order->total_price, 2) }}</span></p>
                    <p class="text-sm">Date: <span class="text-gray-600">{{ $order->created_at->format('M d, Y - h:i A') }}</span></p>
                    <div class="mt-2">
                        <span class="
                            px-2 py-1 rounded text-xs font-semibold
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status === 'completed') bg-green-100 text-green-800
                            @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800
                            @endif
                        ">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center text-gray-500 mt-10">
        <p>You haven't placed any orders yet.</p>
    </div>
@endif
@endsection
