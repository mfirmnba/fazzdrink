<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Panel - @yield('title', 'Dashboard')</title>
        @vite('resources/css/app.css') @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-100">
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-64 bg-blue-900 text-white p-6 min-h-screen">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <ul class="mt-6 space-y-2">
                    <li>
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}"
                        >
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.categories.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.categories.*') ? 'bg-blue-700' : '' }}"
                        >
                            Categories
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.products.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.products.*') ? 'bg-blue-700' : '' }}"
                        >
                            Products
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.carts.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.addresses.*') ? 'bg-blue-700' : '' }}"
                        >
                            Cart
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.branches.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.branches.*') ? 'bg-blue-700' : '' }}"
                        >
                            Branch
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.orders.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.orders.*') ? 'bg-blue-700' : '' }}"
                        >
                            Orders
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.payments.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.payments.*') ? 'bg-blue-700' : '' }}"
                        >
                            Payments
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.reviews.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.reviews.*') ? 'bg-blue-700' : '' }}"
                        >
                            Reviews
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.addresses.index') }}"
                            class="block py-2 px-4 rounded hover:bg-blue-700 {{ request()->routeIs('admin.addresses.*') ? 'bg-blue-700' : '' }}"
                        >
                            Addresses
                        </a>
                    </li>
                </ul>

                <form action="{{ route('logout') }}" method="POST" class="mt-6">
                    @csrf
                    <button
                        type="submit"
                        class="w-full bg-red-600 py-2 px-4 rounded hover:bg-red-700"
                    >
                        Logout
                    </button>
                </form>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-6">@yield('content')</div>
        </div>
    </body>
</html>
