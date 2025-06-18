<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')

    
</head>
<body class="min-h-screen bg-gray-100">

<div class="drawer lg:drawer-open">
    <input id="sidebar-toggle" type="checkbox" class="drawer-toggle" />

    <!-- Main content -->
    <div class="drawer-content flex flex-col">
        <!-- Navbar -->
        <div class="navbar bg-white shadow px-4">
            <!-- Hamburger for mobile -->
            <div class="flex-none lg:hidden">
                <label for="sidebar-toggle" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </label>
            </div>
            <!-- Title -->
            <div class="flex-1">
                <span class="text-xl font-semibold">@yield('title', 'Dashboard')</span>
            </div>
            <!-- Right icons -->
            <div class="flex-none gap-2">
                <input type="text" placeholder="Search" class="input input-bordered input-sm w-36" />
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="https://i.pravatar.cc/100" alt="Profile" />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                        <li><a>Profile</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>

    <!-- Sidebar -->
    <div class="drawer-side">
        <label for="sidebar-toggle" class="drawer-overlay"></label>
        <aside class="w-64 bg-base-100 text-base-content shadow-lg min-h-screen flex flex-col">
            <!-- Branding -->
            <div class="p-4 border-b border-gray-200">
                <a href="{{ route('home.index') }}" class="text-2xl font-bold">📦 Inventory</a>
            </div>

            <!-- Menu -->
            <ul class="menu p-4 flex-1 overflow-y-auto">
                <li class="menu-title">Stocks Management</li>
                <li>
                    <a href="{{ route('product-categories.category') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Product Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('prodSupply.supp') }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path d="M20 13V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6m16 0l-8 8-8-8" />
                        </svg>
                        Product Suppliers
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="flex justify-between items-center">
                        <span>
                            🛒 Products
                        </span>
                        <span class="badge badge-sm badge-error">1</span>
                    </a>
                </li>
                <li>
                    <a class="flex justify-between items-center">
                        <span>📦 Orders</span>
                        <span class="badge badge-sm badge-error">416</span>
                    </a>
                </li>

                <li class="menu-title">Users Management</li>
                <li>
                    <a class="flex justify-between items-center">
                        <span>👥 Roles</span>
                        <span class="badge badge-sm">3</span>
                    </a>
                </li>
                <li>
                    <a class="flex justify-between items-center">
                        <span>👤 Users</span>
                        <span class="badge badge-sm">3</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>
{{--     
    this is the modal for adding new products --}}
        <!-- Button to open the modal -->


<!-- Modal -->
<div class="modal" role="dialog" id="add_product_modal">
  <div class="modal-box w-11/12 max-w-2xl">
    <h3 class="font-bold text-lg mb-4">Add New Product</h3>

    <form method="POST" action="" enctype="multipart/form-data">
      @csrf

      <!-- Product Name -->
      <div class="form-control mb-3">
        <label class="label">
          <span class="label-text font-semibold">Product Name</span>
        </label>
        <input type="text" name="name" class="input input-bordered" required>
      </div>

      <!-- Price -->
      <div class="form-control mb-3">
        <label class="label">
          <span class="label-text font-semibold">Price</span>
        </label>
        <input type="number" step="0.01" name="price" class="input input-bordered" required>
      </div>

      <!-- Quantity -->
      <div class="form-control mb-3">
        <label class="label">
          <span class="label-text font-semibold">Quantity</span>
        </label>
        <input type="number" name="quantity" class="input input-bordered" required>
      </div>

      <!-- Category -->
      <div class="form-control mb-3">
        <label class="label">
          <span class="label-text font-semibold">Category</span>
        </label>
        <select name="product_categories_id" class="select select-bordered" required>
          {{-- @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach --}}
        </select>
      </div>

      <!-- Supplier -->
      <div class="form-control mb-3">
        <label class="label">
          <span class="label-text font-semibold">Supplier</span>
        </label>
        <select name="product_suppliers_id" class="select select-bordered" required>
          {{-- @foreach ($suppliers as $supplier)
            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
          @endforeach --}}
        </select>
      </div>

      <!-- Image -->
      <div class="form-control mb-4">
        <label class="label">
          <span class="label-text font-semibold">Product Image</span>
        </label>
        <input type="file" name="image" class="file-input file-input-bordered w-full" accept="image/*">
      </div>

      <div class="modal-action">
        <a href="#" class="btn">Cancel</a>
        <button type="submit" class="btn btn-primary">Save Product</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
