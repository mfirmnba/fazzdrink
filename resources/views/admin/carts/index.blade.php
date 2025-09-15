@extends('admin.layouts.app') @section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">Daftar Keranjang User</h2>

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-3">User</th>
                    <th class="p-3">Total Items</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($carts as $cart)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $cart->user->name ?? 'N/A' }}</td>
                    <td class="p-3">{{ $cart->items()->sum('quantity') }}</td>
                    <td class="p-3 text-center space-x-2">
                        <a
                            href="{{ route('admin.carts.show', $cart->id) }}"
                            class="inline-block bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition"
                        >
                            Lihat Detail
                        </a>
                        <form
                            action="{{ route('admin.carts.destroy', $cart->id) }}"
                            method="POST"
                            class="inline-block"
                            onsubmit="return confirm('Yakin ingin menghapus keranjang ini?')"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition"
                            >
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-3 text-center text-gray-500">
                        Tidak ada keranjang.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $carts->links() }}
    </div>
</div>
@endsection
