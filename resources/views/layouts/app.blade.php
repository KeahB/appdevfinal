<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-base-200 shadow-md p-4 hidden md:block">
            <div class="mb-6 text-xl font-bold">
                🧩 Admin Panel
            </div>
            <ul class="menu">
                <li><a">📊 Dashboard</a></li>
                <li><a >📁 Product Categories</a></li>
                <li><a >🚚 Product Suppliers</a></li>
                <li><a >👥 User Management</a></li>
            </ul>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="md:hidden mb-4">
                <!-- For mobile menu button -->
                <label for="menu-toggle" class="btn btn-sm btn-outline">
                    ☰ Menu
                </label>
            </div>

            <input type="checkbox" id="menu-toggle" class="hidden peer">
            <div class="peer-checked:block hidden bg-base-200 p-4 rounded-md mb-4 md:hidden">
                <ul class="menu">
                    <li><a >📊 Dashboard</a></li>
                    <li><a >📁 Product Categories</a></li>
                    <li><a 🚚 Product Suppliers</a></li>
                    <li><a >👥 User Management</a></li>
                </ul>
            </div>

            <!-- Content -->
            @yield('content')
        </div>
    </div>
</body>
</html>
