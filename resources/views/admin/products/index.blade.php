@extends('layouts.app')

@section('title', '')

@section('content')
<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">🛒 All Products</h1>
        <button class="btn btn-success" onclick="addProductModal.showModal()">+ Add Product</button>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-lg mt-4">
            {{ session('success') }}
        </div>
    @endif
</div>

<!-- Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition">
            <div class="card-body">
                <h2 class="card-title">{{ $product->name }}</h2>
                <p class="text-gray-600">{{ $product->description }}</p>
                <p><strong>Price:</strong> ₱{{ number_format($product->price, 2) }}</p>
                <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <p><strong>Supplier:</strong> {{ $product->supplier->name ?? 'N/A' }}</p>

                <div class="card-actions justify-end mt-4">
                    <button onclick="document.getElementById('editModal-{{ $product->id }}').showModal()" class="btn btn-sm btn-warning">Edit</button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-error">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Product Modal -->
        <dialog id="editModal-{{ $product->id }}" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-4">Edit Product</h3>
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-control mb-2">
                        <label class="label">Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="input input-bordered" required>
                    </div>
                    <div class="form-control mb-2">
                        <label class="label">Description</label>
                        <textarea name="description" class="textarea textarea-bordered">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-control mb-2">
                        <label class="label">Price</label>
                        <input type="number" name="price" step="0.01" value="{{ $product->price }}" class="input input-bordered" required>
                    </div>
                    <div class="form-control mb-2">
                        <label class="label">Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="input input-bordered" required>
                    </div>
                    <div class="form-control mb-4">
                        <label class="label">Supplier</label>
                        <select name="supplier_id" class="select select-bordered">
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" @if($product->supplier_id == $supplier->id) selected @endif>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-action">
                        <button type="button" class="btn" onclick="document.getElementById('editModal-{{ $product->id }}').close()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </dialog>
    @endforeach
</div>

<!-- Add Product Modal -->
<dialog id="addProductModal" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg mb-4">Add New Product</h3>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-control mb-2">
                <label class="label">Name</label>
                <input type="text" name="name" class="input input-bordered" required>
            </div>
            <div class="form-control mb-2">
                <label class="label">Description</label>
                <textarea name="description" class="textarea textarea-bordered"></textarea>
            </div>
            <div class="form-control mb-2">
                <label class="label">Price</label>
                <input type="number" name="price" step="0.01" class="input input-bordered" required>
            </div>
            <div class="form-control mb-2">
                <label class="label">Quantity</label>
                <input type="number" name="quantity" class="input input-bordered" required>
            </div>
            <div class="form-control mb-4">
                <label class="label">Supplier</label>
                <select name="supplier_id" class="select select-bordered">
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-action">
                <button type="button" class="btn" onclick="addProductModal.close()">Cancel</button>
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
        </form>
    </div>
</dialog>
@endsection
