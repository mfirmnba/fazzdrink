@extends('layouts.app') @section('content')
<!-- Hero Section -->
<section
    class="bg-cover bg-center"
    style="background-image: url('/images/hero-bg.jpg')"
>
    <div class="bg-black bg-opacity-50 text-white p-16 text-center">
        <h1 class="text-4xl font-bold">#1 Cafe On Wheels</h1>
        <p class="mt-4 text-lg">
            Fresh coffee, delivered to your location — fast and affordable.
        </p>
        <a
            href="#"
            class="mt-6 inline-block bg-red-600 px-6 py-3 rounded-lg text-white hover:bg-red-700"
        >
            Download App
        </a>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-12 text-center">
    <h2 class="text-3xl font-semibold mb-6">Try Us in 3 Steps</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div>
            <img
                src="/images/step1.png"
                alt="Choose Location"
                class="mx-auto mb-4"
            />
            <h3 class="text-xl font-medium">1. Choose Your Location</h3>
        </div>
        <div>
            <img
                src="/images/step2.png"
                alt="Select Drink"
                class="mx-auto mb-4"
            />
            <h3 class="text-xl font-medium">2. Select Coffee or Tea</h3>
        </div>
        <div>
            <img src="/images/step3.png" alt="Easy Pay" class="mx-auto mb-4" />
            <h3 class="text-xl font-medium">
                3. Pay & Wait — Jago Will Arrive
            </h3>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-12 bg-gray-100">
    <h2 class="text-3xl font-semibold text-center mb-8">Featured Drinks</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 px-4 md:px-12">
        @foreach($products as $product)
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg">
            <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
            <p class="mt-2 text-gray-600">
                {{ Str::limit($product->description, 80) }}
            </p>
            <p class="mt-4 font-bold">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>
            <a
                href="{{ route('products.show', $product->id) }}"
                class="mt-3 inline-block bg-brown-700 text-white px-4 py-2 rounded hover:bg-brown-800"
            >
                View Details
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- Testimonials (Highlight Style) -->
<section class="py-12">
    <h2 class="text-3xl font-semibold text-center mb-6">
        What Our Customers Say
    </h2>
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        <blockquote class="bg-white p-6 rounded-lg shadow">
            <p class="italic">
                "My go-to when I’m too lazy to order elsewhere!"
            </p>
            <footer class="mt-4 font-semibold">— Rizky</footer>
        </blockquote>
        <blockquote class="bg-white p-6 rounded-lg shadow">
            <p class="italic">
                "The mobile cafe cart is so cool and the coffee is great."
            </p>
            <footer class="mt-4 font-semibold">— Ayu</footer>
        </blockquote>
    </div>
</section>

<section class="py-6 text-center text-gray-600">
    &copy; {{ date("Y") }} Kopifazz Drink — Inspired by Jago Coffee
</section>
@endsection
