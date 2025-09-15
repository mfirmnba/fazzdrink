<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Panel - {{ config("app.name", "Kopifazzdrink") }}</title>
        @vite('resources/css/app.css') @vite('resources/js/app.js')
    </head>
    <body class="flex bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-900 text-white min-h-screen p-6">
            <h2 class="text-2xl font-bold">Admin Panel</h2>
            <ul class="mt-6 space-y-2">
                <li>
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700"
                    >
                        Dashboard
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('categories.index') }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700"
                    >
                        Categories
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('products.index') }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700"
                    >
                        Products
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('orders.index') }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700"
                    >
                        Orders
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('payments.index') }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700"
                    >
                        Payments
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('reviews.index') }}"
                        class="block py-2 px-4 rounded hover:bg-blue-700"
                    >
                        Reviews
                    </a>
                </li>
            </ul>

            <div class="mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 py-2 px-4 rounded"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">@yield('content')</main>
    </body>
</html>
