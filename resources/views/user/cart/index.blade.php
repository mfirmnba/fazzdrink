@extends('layouts.app') @section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">
        🛒 Keranjang Belanja
    </h2>

    @if($items->count() > 0)
    <div class="overflow-x-auto">
        <table
            class="w-full border-collapse bg-white shadow-lg rounded-lg overflow-hidden"
        >
            <thead>
                <tr class="bg-red-600 text-white text-left">
                    <th class="p-4">Produk</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Jumlah</th>
                    <th class="p-4">Subtotal</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp @foreach($items as $item) @php
                $subtotal = $item->product->price * $item->quantity; $total +=
                $subtotal; @endphp
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 font-semibold text-gray-800">
                        {{ $item->product->name }}
                    </td>
                    <td class="p-4 text-gray-600">
                        Rp
                        {{ number_format($item->product->price, 0, ',', '.') }}
                    </td>
                    <td class="p-4 text-center">
                        {{ $item->quantity }}
                    </td>
                    <td class="p-4 text-gray-700 font-medium">
                        Rp {{ number_format($subtotal, 0, ",", ".") }}
                    </td>
                    <td class="p-4 text-center">
                        <form
                            action="{{ route('cart.remove', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Yakin mau hapus item ini?')"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-red-700 transition"
                            >
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                {{-- Total --}}
                <tr class="bg-gray-100 font-bold">
                    <td colspan="3" class="p-4 text-right">Total</td>
                    <td colspan="2" class="p-4 text-red-600 text-lg">
                        Rp {{ number_format($total, 0, ",", ".") }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Tombol Checkout --}}
    <div class="mt-6 text-right">
        <a
            href="{{ route('checkout.index') }}"
            class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 transition"
        >
            Checkout
        </a>
    </div>
    @else
    <div
        class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-6 rounded-lg text-center"
    >
        <p class="text-lg">Keranjang kamu masih kosong 😢</p>
        <a
            href="{{ route('products.index') }}"
            class="mt-4 inline-block bg-red-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-red-700 transition"
        >
            Belanja Sekarang
        </a>
    </div>
    @endif
</div>
@endsection
