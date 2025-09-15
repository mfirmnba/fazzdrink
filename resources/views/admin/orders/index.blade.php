<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Orders</h1>
        <a
            href="{{ route('admin.orders.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded"
            >Tambah Order</a
        >
        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-200">
                    <th>ID</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="border-t">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        Rp
                        {{ number_format($order->total_amount, 0, ',', '.') }}
                    </td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a
                            href="{{ route('admin.orders.edit', $order) }}"
                            class="text-blue-500"
                            >Edit</a
                        >
                        |
                        <form
                            action="{{ route('admin.orders.destroy', $order) }}"
                            method="POST"
                            class="inline"
                        >
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
