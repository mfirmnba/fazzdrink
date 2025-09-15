@extends('layouts.app') @section('content')
{{-- HERO VIDEO --}}
<section class="relative bg-gray-100">
    <video
        autoplay
        muted
        loop
        playsinline
        class="w-full object-cover h-[300px] sm:h-[400px] md:h-[500px]"
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

{{-- MENU PER KATEGORI --}}
<section class="container mx-auto px-4 sm:px-6 py-12 sm:py-16">
    <h2
        class="text-2xl sm:text-3xl font-extrabold text-center mb-10 sm:mb-12 tracking-wide"
    >
        OUR MENU
    </h2>

    @foreach($categories as $category)
    <div class="mb-12 sm:mb-16">
        {{-- Judul kategori dengan garis --}}
        <div class="flex items-center mb-6 sm:mb-8">
            <div class="flex-grow border-t border-gray-300"></div>
            <h3
                class="mx-4 text-xl sm:text-2xl font-semibold text-gray-800 tracking-wide text-center"
            >
                {{ strtoupper($category->name) }}
            </h3>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        {{-- Grid produk --}}
        <div class="overflow-x-auto">
            <div class="grid grid-cols-6 gap-6 min-w-max">
                @forelse($category->products as $product)
                <div
                    class="bg-white shadow-lg rounded-2xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl w-40"
                >
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-40 object-cover"
                    />
                    <div class="p-4">
                        <h3 class="text-sm font-bold text-gray-800 truncate">
                            {{ strtoupper($product->name) }}
                        </h3>
                        <p class="text-indigo-600 font-semibold mt-2 text-sm">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
                @empty
                <p class="col-span-full text-center text-gray-500 italic">
                    Belum ada produk di kategori ini.
                </p>
                @endforelse
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection
