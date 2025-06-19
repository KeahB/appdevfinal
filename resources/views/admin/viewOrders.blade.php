@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold mb-2">📝 Manage Orders</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->count())
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>₱{{ number_format($order->total_price, 2) }}</td>
                            <td>
                                <span class="badge {{
                                    $order->status === 'pending' ? 'badge-warning' : (
                                        $order->status === 'accepted' ? 'badge-success' : 'badge-error'
                                    )
                                }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                @if($order->status === 'pending')
                                    <div class="flex gap-2">
                                        <form method="POST" action="{{ route('orders.updateStatus', ['id' => $order->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="accepted">
                                            <button class="btn btn-success btn-sm">Accept</button>
                                        </form>

                                        <form method="POST" action="{{ route('orders.updateStatus', ['id' => $order->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="declined">
                                            <button class="btn btn-error btn-sm">Decline</button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-500 text-sm italic">No action</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-gray-500">No orders found.</div>
    @endif
@endsection
