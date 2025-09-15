@extends('layouts.app') @section('content')
<div class="max-w-4xl mx-auto py-12">
    <div class="bg-white p-6 rounded-lg shadow">
        @if($product->image)
        <img
            src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->name }}"
            class="w-full h-64 object-cover rounded mb-6"
        />
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
        <p class="text-gray-600 mb-4">{{ $product->description }}</p>
        <p class="text-2xl font-semibold mb-6">
            Rp {{ number_format($product->price, 0, ',', '.') }}
        </p>

        <button
            class="bg-red-600 text-white px-6 py-3 rounded hover:bg-red-700"
        >
            Order Now
        </button>
    </div>
</div>
@endsection
