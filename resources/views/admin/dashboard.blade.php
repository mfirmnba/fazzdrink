{{-- resources/views/admin/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Dashboard</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css"
            rel="stylesheet"
        />
    </head>
    <body class="bg-gray-100">
        <!-- Sidebar -->
        <div class="flex">
            <div class="w-64 bg-blue-900 text-white p-6 min-h-screen">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <ul class="mt-6 space-y-2">
                    <li>
                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Dashboard</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.products.index') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Products</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.categories.index') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Categories</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.carts.index') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
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
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Orders</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.payments.index') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Payments</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.reviews.index') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Reviews</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('admin.addresses.index') }}"
                            class="block py-2 px-4 hover:bg-blue-700 rounded"
                            >Addresses</a
                        >
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                type="submit"
                                class="w-full text-left block py-2 px-4 hover:bg-red-700 rounded"
                            >
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-6">
                <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>

                <!-- Stats Cards -->
                <div
                    class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Users</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalUsers }}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Products</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalProducts }}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Categories</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalCategories }}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Orders</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalOrders }}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Payments</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalPayments }}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Reviews</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalReviews }}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold">Cart</h3>
                        <div class="mt-4 text-3xl font-bold">
                            {{ $totalCartItems }}
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Overview</h3>
                    <canvas id="salesChart" class="mt-4"></canvas>
                </div>

                <!-- Latest Orders -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Latest Orders</h3>
                    <table class="min-w-full mt-4 table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Order ID</th>
                                <th class="px-4 py-2 text-left">User</th>
                                <th class="px-4 py-2 text-left">Total</th>
                                <th class="px-4 py-2 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestOrders as $order)
                            <tr>
                                <td class="px-4 py-2">#{{ $order->id }}</td>
                                <td class="px-4 py-2">
                                    {{ $order->user->name ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2">
                                    ${{ number_format($order->total_amount, 2) }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ ucfirst($order->status) }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td
                                    colspan="4"
                                    class="px-4 py-2 text-center text-gray-500"
                                >
                                    No orders yet.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Latest Cart Items -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Latest Cart Items</h3>
                    <table class="min-w-full mt-4 table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Cart ID</th>
                                <th class="px-4 py-2 text-left">User</th>
                                <th class="px-4 py-2 text-left">Product</th>
                                <th class="px-4 py-2 text-left">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestCartItems as $item)
                            <tr>
                                <td class="px-4 py-2">#{{ $item->cart_id }}</td>
                                <td class="px-4 py-2">
                                    {{ $item->cart->user->name ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2">
                                    {{ $item->product->name ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2">{{ $item->quantity }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td
                                    colspan="4"
                                    class="px-4 py-2 text-center text-gray-500"
                                >
                                    No cart items yet.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            const ctx1 = document.getElementById("salesChart").getContext("2d");
            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                    datasets: [
                        {
                            label: "Orders",
                            data: [10, 25, 30, 40, 35, 50, 70],
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 2,
                            fill: false,
                        },
                        {
                            label: "Payments",
                            data: [8, 20, 28, 38, 32, 48, 65],
                            borderColor: "rgba(255, 99, 132, 1)",
                            borderWidth: 2,
                            fill: false,
                        },
                    ],
                },
                options: { responsive: true },
            });
        </script>
    </body>
</html>
