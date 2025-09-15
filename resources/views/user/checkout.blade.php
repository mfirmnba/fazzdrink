@extends('layouts.app') @section('content')
<div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-6">Checkout</h2>

    @if(!$cart || $cart->items->isEmpty())
    <p class="text-gray-600">Keranjang masih kosong.</p>
    @else
    <div>
        {{-- Alamat Pengiriman --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2"
                >Alamat Pengiriman</label
            >
            <input
                type="text"
                id="address"
                class="w-full border rounded px-3 py-2"
                placeholder="Isi alamat atau gunakan lokasi saya"
                required
            />
        </div>

        {{-- Hidden Latitude & Longitude --}}
        <input type="hidden" id="latitude" />
        <input type="hidden" id="longitude" />

        {{-- Tombol Gunakan Lokasi --}}
        <button
            type="button"
            onclick="getLocation()"
            class="bg-blue-600 text-white px-4 py-2 rounded mb-4"
        >
            Gunakan Lokasi Saya
        </button>

        {{-- Ringkasan Pesanan --}}
        <h3 class="text-xl font-bold mb-4">Ringkasan Pesanan</h3>
        <ul class="mb-6">
            @foreach($cart->items as $item)
            <li class="product-item mb-2">
                {{ $item->product->name }} ({{ $item->quantity }}x) - Rp
                {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
            </li>
            @endforeach
        </ul>

        {{-- Tombol WhatsApp --}}
        <button
            type="button"
            onclick="handleWhatsApp()"
            class="bg-green-600 text-white px-6 py-2 rounded-lg font-bold"
        >
            Pesan via WhatsApp
        </button>
    </div>
    @endif
</div>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    document.getElementById("latitude").value = lat;
                    document.getElementById("longitude").value = lng;
                    reverseGeocode(lat, lng);
                },
                function () {
                    alert("Gagal mendapatkan lokasi.");
                }
            );
        } else {
            alert("Browser Anda tidak mendukung Geolocation.");
        }
    }

    function reverseGeocode(lat, lng) {
        fetch(
            `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`
        )
            .then((response) => response.json())
            .then((data) => {
                if (data && data.display_name) {
                    document.getElementById("address").value =
                        data.display_name;
                } else {
                    alert("Alamat tidak ditemukan.");
                }
            })
            .catch((err) => {
                console.error(err);
                alert("Terjadi kesalahan saat mencari alamat.");
            });
    }

    function handleWhatsApp() {
        const address = document.getElementById("address").value.trim();
        const latitude = document.getElementById("latitude").value.trim();
        const longitude = document.getElementById("longitude").value.trim();

        if (!address) {
            alert("Silakan isi alamat pengiriman.");
            return;
        }

        // Ambil nama user dari Laravel
        const userName = "{{ Auth::user()->name }}";

        // Nomor WA internasional tanpa +
        const phone = "6287729100641";

        // Ambil daftar produk
        const items = [];
        document
            .querySelectorAll(".product-item")
            .forEach((li) => items.push(li.textContent.trim()));

        const message = encodeURIComponent(
            `Halo Admin, saya ${userName} ingin memesan:\n\n${items.join(
                "\n"
            )}\n\nAlamat pengiriman:\n${address}\n\nLokasi pengiriman:\nLatitude: ${latitude}\nLongitude: ${longitude}`
        );

        // Buka WA di tab baru
        const url = `https://wa.me/${phone}?text=${message}`;
        window.open(url, "_blank");
    }
</script>
@endsection
