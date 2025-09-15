@extends('admin.layouts.app') @section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">
        Detail Keranjang - {{ $cart->user->name ?? 'User Tidak Diketahui' }}
    </h2>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">Produk</th>
                <th class="p-3">Harga</th>
                <th class="p-3">Jumlah</th>
                <th class="p-3">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cart->items as $item)
            <tr>
                <td class="p-3">
                    {{ $item->product->name ?? 'Produk dihapus' }}
                </td>
                <td class="p-3">
                    Rp
                    {{ number_format($item->product->price ?? 0, 0, ',', '.') }}
                </td>
                <td class="p-3">{{ $item->quantity }}</td>
                <td class="p-3">
                    Rp
                    {{ number_format(($item->product->price ?? 0) * $item->quantity, 0, ',', '.') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-3 text-center text-gray-500">
                    Keranjang kosong.
                </td>
            </tr>
            @endforelse
        </tbody>
        @if($cart->items->count())
        <tfoot>
            <tr class="bg-gray-100 font-bold">
                <td colspan="3" class="p-3 text-right">Total</td>
                <td class="p-3">
                    Rp
                    {{ number_format($cart->items->sum(fn($i) => ($i->product->price ?? 0) * $i->quantity), 0, ',', '.') }}
                </td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="mt-6 flex space-x-3">
        <a
            href="{{ route('admin.carts.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600"
        >
            ← Kembali
        </a>
        <form
            action="{{ route('admin.carts.destroy', $cart->id) }}"
            method="POST"
            onsubmit="return confirm('Hapus keranjang ini?')"
        >
            @csrf @method('DELETE')
            <button
                type="submit"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
            >
                Hapus Keranjang
            </button>
        </form>
    </div>
</div>
@endsection
