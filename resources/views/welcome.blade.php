@extends('welcome.layouts.app') @section('content')
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
        class="text-2xl sm:text-3xl font-extrabold text-center mb-8 sm:mb-12 tracking-wide"
    >
        OUR MENU
    </h2>

    @foreach($categories as $category)
    <div class="mb-10 sm:mb-16">
        {{-- Judul kategori dengan garis --}}
        <div class="flex items-center mb-6 sm:mb-8">
            <div class="flex-grow border-t border-gray-300"></div>
            <h3
                class="mx-2 sm:mx-4 text-lg sm:text-2xl font-semibold text-gray-800 tracking-wide text-center"
            >
                {{ strtoupper($category->name) }}
            </h3>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        {{-- Grid produk --}}
        <div
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 sm:gap-6"
        >
            @forelse($category->products as $product)
            <div
                class="bg-white shadow-lg rounded-xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl"
            >
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="w-full h-32 sm:h-40 md:h-48 object-cover"
                />
                <div class="p-3 sm:p-5">
                    <h3
                        class="text-xs sm:text-sm md:text-lg font-bold text-gray-800 truncate"
                    >
                        {{ strtoupper($product->name) }}
                    </h3>
                    <p
                        class="text-indigo-600 font-semibold mt-1 sm:mt-2 text-xs sm:text-sm md:text-base"
                    >
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
    @endforeach
</section>

{{-- SECTION: PILIHAN PAKET --}}
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold mb-10">PILIHAN PAKET KOPI</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Paket 50-100 Cups --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">50 - 100 CUPS</h3>
                <p class="text-lg font-semibold text-yellow-600 mb-4">
                    Start from Rp 500.000
                </p>
                <ul class="text-left text-sm space-y-2 mb-6">
                    <li>
                        <strong>Maximum Distance (Free Delivery):</strong> 10 km
                    </li>
                    <li><strong>Maximum Standby Duration:</strong> 1 Hour</li>
                    <li><strong>Jago Cart Included:</strong> Yes</li>
                    <li><strong>Number of Jagoan/Barista:</strong> 1</li>
                    <li><strong>Booking Time:</strong> D-2</li>
                </ul>
                <a
                    href="{{ route('login') }}"
                    class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition"
                >
                    BOOK NOW
                </a>
            </div>
            {{-- Paket 101-200 Cups --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">101 - 200 CUPS</h3>
                <p class="text-lg font-semibold text-yellow-600 mb-4">
                    Start from Rp 1.000.000
                </p>
                <ul class="text-left text-sm space-y-2 mb-6">
                    <li>
                        <strong>Maximum Distance (Free Delivery):</strong> 10 km
                    </li>
                    <li><strong>Maximum Standby Duration:</strong> 1.5 Hour</li>
                    <li><strong>Jago Cart Included:</strong> Yes</li>
                    <li><strong>Number of Jagoan/Barista:</strong> 2</li>
                    <li><strong>Booking Time:</strong> D-2</li>
                </ul>
                <a
                    href="{{ route('login') }}"
                    class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition"
                >
                    BOOK NOW
                </a>
            </div>
            {{-- Paket 201-300 Cups --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">201 - 300 CUPS</h3>
                <p class="text-lg font-semibold text-yellow-600 mb-4">
                    Start from Rp 2.000.000
                </p>
                <ul class="text-left text-sm space-y-2 mb-6">
                    <li>
                        <strong>Maximum Distance (Free Delivery):</strong> 10 km
                    </li>
                    <li><strong>Maximum Standby Duration:</strong> 2 Hour</li>
                    <li><strong>Jago Cart Included:</strong> Yes</li>
                    <li><strong>Number of Jagoan/Barista:</strong> 3</li>
                    <li><strong>Booking Time:</strong> D-2</li>
                </ul>
                <a
                    href="{{ route('login') }}"
                    class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition"
                >
                    BOOK NOW
                </a>
            </div>
        </div>
    </div>
</section>

{{-- SECTION: TESTIMONI PELANGGAN --}}
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-12 uppercase">
            What Our Customers Are Saying About Fazz Drink
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Testimoni 1 --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-4xl text-red-600 mb-4">“</div>
                <p class="text-gray-800 text-base mb-4">
                    Now every time I have a company event, I always order Jago
                    Party! It’s so convenient, especially now I can order it via
                    Jago app.
                </p>
                <p class="font-bold text-red-600 uppercase">– Bayu</p>
            </div>
            {{-- Gambar Tengah --}}
            <div>
                <img
                    src="{{ asset('images/Team.jpeg') }}"
                    alt="Jago Team"
                    class="rounded-lg w-full object-cover h-full max-h-[360px]"
                />
            </div>
            {{-- Testimoni 2 --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-4xl text-red-600 mb-4">“</div>
                <p class="text-gray-800 text-base mb-4">
                    I had Jago Party for my wedding, and my guests gave lots of
                    compliments! They said it’s so unique and the drink is good.
                </p>
                <p class="font-bold text-red-600 uppercase">– Syafira</p>
            </div>
            {{-- Gambar Tambahan --}}
            <div>
                <img
                    src="{{ asset('images/Booth.jpeg') }}"
                    alt="Jago Booth"
                    class="rounded-lg w-full object-cover h-full max-h-[360px]"
                />
            </div>
            {{-- Testimoni 3 (Opsional) --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-4xl text-red-600 mb-4">“</div>
                <p class="text-gray-800 text-base mb-4">
                    Everyone was surprised when KopiFazzDrink arrived at our
                    office. Super fun and the coffee tastes amazing!
                </p>
                <p class="font-bold text-red-600 uppercase">– Raka</p>
            </div>
        </div>
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

{{-- HOW IT WORKS --}}
<section id="how-it-works" class="bg-gray-50 py-20">
    <div class="container mx-auto px-6 text-center">
        <h2
            class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-12 tracking-wide"
        >
            How It Works
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            {{-- Step 1 --}}
            <div
                class="bg-white shadow-lg rounded-2xl p-8 transform transition hover:scale-105 hover:shadow-2xl"
            >
                <div class="flex justify-center mb-6">
                    <div
                        class="bg-red-100 text-red-600 w-16 h-16 flex items-center justify-center rounded-full text-2xl font-bold"
                    >
                        1
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Choose Your Drink
                </h3>
                <p class="text-gray-600">
                    Browse our menu and pick your favorite coffee, non-coffee,
                    or juice.
                </p>
            </div>
            {{-- Step 2 --}}
            <div
                class="bg-white shadow-lg rounded-2xl p-8 transform transition hover:scale-105 hover:shadow-2xl"
            >
                <div class="flex justify-center mb-6">
                    <div
                        class="bg-red-100 text-red-600 w-16 h-16 flex items-center justify-center rounded-full text-2xl font-bold"
                    >
                        2
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Set Your Location
                </h3>
                <p class="text-gray-600">
                    Pinpoint your exact location so our barista can deliver
                    right to your door.
                </p>
            </div>
            {{-- Step 3 --}}
            <div
                class="bg-white shadow-lg rounded-2xl p-8 transform transition hover:scale-105 hover:shadow-2xl"
            >
                <div class="flex justify-center mb-6">
                    <div
                        class="bg-red-100 text-red-600 w-16 h-16 flex items-center justify-center rounded-full text-2xl font-bold"
                    >
                        3
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Enjoy Seamless Payment
                </h3>
                <p class="text-gray-600">
                    Pay easily with GoPay, OVO, or cashless method. Sit back and
                    relax!
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
