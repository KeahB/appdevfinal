@extends('layouts.userlayout')

@section('content')
    <h1 class="text-3xl font-bold mb-6">🛒 Order Products</h1>

    @if(session('success'))
        <div class="alert alert-success shadow-lg mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->name }}</h2>
                        <p class="text-gray-600">{{ $product->description }}</p>
                        <p class="text-blue-600 font-bold">₱{{ number_format($product->price, 2) }}</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-primary" onclick="document.getElementById('orderModal-{{ $product->id }}').showModal()">Order</button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <dialog id="orderModal-{{ $product->id }}" class="modal">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg mb-3">Order: {{ $product->name }}</h3>
                        <p class="mb-4 text-gray-600">Price: ₱{{ number_format($product->price, 2) }}</p>

                        <form action="{{ route('orders.place') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="form-control mb-4">
                                <label class="label">
                                    <span class="label-text">Quantity</span>
                                </label>
                                <input type="number" name="quantity" min="1" value="1" required class="input input-bordered" />
                            </div>

                            <div class="modal-action">
                                <form method="dialog">
                                    <button type="button" class="btn" onclick="document.getElementById('orderModal-{{ $product->id }}').close()">Cancel</button>
                                </form>
                                <button type="submit" class="btn btn-primary">Confirm Order</button>
                            </div>
                        </form>
                    </div>
                </dialog>
            @endforeach
        </div>
    @else
        <div class="text-center text-gray-500 mt-10">
            <p>No products available at the moment.</p>
        </div>
    @endif
@endsection
