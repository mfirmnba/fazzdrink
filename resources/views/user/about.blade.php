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

{{-- SECTION: APA ITU FAZZDRINK --}}
<section class="bg-white py-12 sm:py-16">
    <div
        class="container mx-auto px-4 sm:px-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-center"
    >
        {{-- Teks --}}
        <div class="text-left order-2 md:order-1">
            <h2 class="text-2xl sm:text-3xl font-extrabold mb-6 text-red-700">
                Apa itu FazzDrink?
            </h2>
            <p class="text-gray-700 leading-relaxed mb-4 text-sm sm:text-base">
                <strong>FazzDrink</strong> merupakan brand minuman gerobakan
                yang hadir sebagai jawaban atas kebutuhan generasi muda akan
                minuman berkualitas dengan harga terjangkau dan pelayanan cepat.
                Sebagai brand baru, kami berkomitmen menghadirkan pengalaman
                terbaik bagi pelanggan melalui rasa yang konsisten, penyajian
                praktis, dan pelayanan profesional.
            </p>
            <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                Kami percaya bahwa setiap gelas minuman bukan hanya sekedar
                produk, melainkan juga pengalaman — mulai dari kecepatan
                pelayanan, keramahan barista, hingga kepuasan pelanggan di
                setiap tegukan.
            </p>
        </div>

        {{-- Logo --}}
        <div class="flex justify-center order-1 md:order-2">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo FazzDrink"
                class="w-28 sm:w-40 md:w-56 border-2 border-red-600 rounded-lg p-4 shadow-lg"
            />
        </div>
    </div>
</section>

{{-- SECTION: VISI DAN MISI --}}
<section class="bg-red-50 py-12 sm:py-16">
    <div class="container mx-auto px-4 sm:px-6 text-center">
        <h2
            class="text-2xl sm:text-3xl md:text-4xl font-bold mb-12 text-red-700"
        >
            Visi dan Misi
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
            {{-- Visi --}}
            <div
                class="bg-white p-6 sm:p-8 rounded-lg shadow-md border-l-4 border-red-600 text-left"
            >
                <h3 class="text-xl sm:text-2xl font-bold mb-4 text-red-700">
                    Visi
                </h3>
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                    Menjadi brand pilihan utama industri F&B yang mengutamakan
                    kualitas produk serta kepuasan pelanggan dengan pelayanan
                    cepat dan harga yang terjangkau.
                </p>
            </div>

            {{-- Misi --}}
            <div
                class="bg-white p-6 sm:p-8 rounded-lg shadow-md border-l-4 border-red-600 text-left"
            >
                <h3 class="text-xl sm:text-2xl font-bold mb-4 text-red-700">
                    Misi
                </h3>
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                    Menyediakan minuman berkualitas untuk meningkatkan semangat
                    berdagang dan memberdayakan pengusaha lokal, dilengkapi
                    peralatan modern untuk melayani pelanggan dengan maksimal.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT US --}}
<section class="bg-white py-12 sm:py-16">
    <div class="container mx-auto px-4 sm:px-6 text-center max-w-3xl">
        <h2
            class="text-2xl sm:text-3xl md:text-4xl font-bold mb-6 text-gray-900"
        >
            Komitmen Kami
        </h2>
        <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
            Kami berkomitmen untuk menyajikan pengalaman menikmati minuman yang
            unik, nikmat dan mudah di akses. Tidak hanya minuman kekinian, kami
            juga menghadirkan setiap tegukan kopi FazzDrink yang diseduh sepenuh
            hati oleh barista kami dan menggunakan biji kopi 100% Arabica
            pilihan. kami sangat menjunjung tinggi kualitas, pelayanan, serta
            apresiasi agar dapat menjadi pilihan utama bagi para konsumen kami.
        </p>
    </div>
</section>
@endsection
