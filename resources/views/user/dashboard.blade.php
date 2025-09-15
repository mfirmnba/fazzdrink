@extends('layouts.app') @section('content')

{{-- HERO VIDEO --}}
<section class="relative bg-gray-100">
    <video
        autoplay
        muted
        loop
        playsinline
        class="w-full object-cover h-64 sm:h-[500px]"
    >
        <source src="{{ asset('images/Hero.mp4') }}" type="video/mp4" />
        Browser Anda tidak mendukung video.
    </video>
    <div
        class="absolute inset-0 bg-black/40 flex items-center justify-center text-center px-4"
    >
        <h2
            class="text-white text-2xl sm:text-4xl md:text-5xl font-extrabold leading-relaxed tracking-wide drop-shadow-lg"
        >
            Selamat Datang di FazzDrink
            <br />
            <span
                class="text-sm sm:text-lg md:text-xl font-medium text-gray-200 drop-shadow-md italic"
            >
                – lo lemot kalo lagi haus –
            </span>
        </h2>
    </div>
</section>

{{-- ABOUT SECTION --}}
<section class="about bg-white py-12 sm:py-16">
    <div
        class="container mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center"
    >
        {{-- Teks --}}
        <div class="about-text">
            <h2
                class="text-xl sm:text-2xl md:text-3xl font-bold mb-4 text-red-600"
            >
                - LO LEMOT KALO LAGI HAUS -
            </h2>
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                Kami hadir untuk para pecinta kopi yang ingin minum kopi tanpa
                ribet.
                <span class="font-bold text-red-600">FazzDrink</span>
                siap menemani hari Anda dengan cita rasa kopi terbaik.
            </p>
        </div>
        {{-- Gambar --}}
        <div class="about-image flex justify-center md:justify-end">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo"
                class="w-40 sm:w-60 md:w-72 border-2 border-red-700 rounded-lg shadow-md"
            />
        </div>
    </div>
</section>

{{-- MENU PRODUK --}}
<section class="container mx-auto px-4 sm:px-6 py-12 sm:py-16">
    <h2
        class="text-2xl sm:text-3xl font-extrabold text-center mb-10 sm:mb-12 tracking-wide"
    >
        Pesan Dibawah
    </h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
        @forelse($products as $product)
        <div
            class="bg-white shadow-lg rounded-2xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl flex flex-col"
        >
            {{-- Gambar --}}
            <img
                src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="w-full h-32 object-cover"
            />

            {{-- Detail --}}
            <div class="p-3 flex flex-col flex-grow">
                <h3 class="text-xs font-bold text-gray-800 truncate">
                    {{ strtoupper($product->name) }}
                </h3>
                <p class="text-indigo-600 font-semibold mt-2 text-xs">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>

                {{-- Form tambah ke keranjang --}}
                <form
                    action="{{ route('cart.add', $product->id) }}"
                    method="POST"
                    class="mt-auto flex flex-col gap-2"
                >
                    @csrf
                    <input
                        type="number"
                        name="quantity"
                        value="1"
                        min="1"
                        class="w-14 text-center border rounded-lg p-1 focus:ring-2 focus:ring-indigo-400 focus:outline-none text-xs"
                    />
                    <button
                        type="submit"
                        class="bg-red-600 text-white px-2 py-1 rounded-lg font-semibold hover:bg-red-700 transition text-xs flex items-center justify-center gap-1"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437m0 0L6.75 14.25h10.5l1.644-7.978a.75.75 0 00-.736-.897H5.477m-.371-1.5H21m-9 9v2.25m0 0v2.25m0-2.25h2.25m-2.25 0H9"
                            />
                        </svg>
                        Keranjang
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="col-span-full text-center text-gray-500 italic">
            Belum ada produk tersedia.
        </p>
        @endforelse
    </div>
</section>

{{-- SOCIAL MEDIA SECTION --}}
<section class="bg-red-600 text-white py-12">
    <div class="container mx-auto px-4 sm:px-6 text-center">
        <h2 class="text-lg sm:text-2xl font-bold mb-6">
            TEMUKAN KAMI DI SOSIAL MEDIA
        </h2>

        <div class="flex justify-center gap-8">
            {{-- Instagram --}}
            <a
                href="https://www.instagram.com/fazzdrink.id?igsh=Z2ljdHQ4Y2R6NmRk&utm_source=qr"
                target="_blank"
                class="flex flex-col items-center hover:scale-110 transition-transform"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10 mb-2"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.5a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7ZM17.5 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"
                    />
                </svg>
                <span class="font-semibold">Instagram</span>
            </a>

            {{-- TikTok (modern logo) --}}
            <a
                href="https://www.tiktok.com/@fazzdrink.id?_t=ZS-8zjvAHkQLeU&_r=1"
                target="_blank"
                class="flex flex-col items-center hover:scale-110 transition-transform"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10 mb-2"
                    viewBox="0 0 48 48"
                >
                    <path
                        fill="currentColor"
                        d="M30 2h6a10 10 0 0 0 10 10v6c-4.5 0-8.5-1.5-11.7-4v18.1c0 7.3-5.9 13.2-13.3 13.2S8 39.4 8 32.1s5.9-13.2 13.3-13.2c1.1 0 2.1.1 3 .4v6.5c-.9-.4-2-.6-3-.6-3.7 0-6.8 3-6.8 6.9s3.1 6.9 6.8 6.9c3.8 0 6.9-3 6.9-6.9V2Z"
                    />
                </svg>
                <span class="font-semibold">TikTok</span>
            </a>
        </div>
    </div>
</section>

@endsection
