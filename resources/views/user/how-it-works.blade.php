@extends('layouts.app') @section('content')
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
