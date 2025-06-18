{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Welcome to your Dashboard, {{ Auth::user()->name }}!</h1>
    <p>This is the main panel after login.</p>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Quick Links</h5>
            <ul>
                <li><a href="{{ route('product-categories.category') }}">Product Categories</a></li>
                <li><a href="{{ route('prodSupply.supp') }}">Product Suppliers</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
