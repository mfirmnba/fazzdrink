<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            {{-- Tombol Kembali --}}
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="text-red-600 text-xl">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            {{-- Judul --}}
            <h2 class="text-3xl font-bold text-center text-red-700 mb-2">
                Daftar
            </h2>
            <p class="text-center text-gray-600 mb-6">
                Buat akun FazzDrink kamu sekarang
            </p>

            {{-- Form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-4">
                    <label for="name" class="block font-semibold mb-1">
                        Nama Lengkap
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        placeholder="Masukkan nama lengkap"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1">
                        Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="Masukkan email aktif"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block font-semibold mb-1">
                        Kata Sandi
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Masukkan kata sandi"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-6">
                    <label
                        for="password_confirmation"
                        class="block font-semibold mb-1"
                    >
                        Konfirmasi Kata Sandi
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        placeholder="Ulangi kata sandi"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    @error('password_confirmation')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Daftar --}}
                <div class="mb-4">
                    <button
                        type="submit"
                        class="w-full bg-red-700 text-white font-bold py-3 rounded-xl hover:bg-red-800 transition duration-300"
                    >
                        Daftar
                    </button>
                </div>

                {{-- Link ke login --}}
                <div class="text-center text-sm">
                    Sudah punya akun?
                    <a
                        href="{{ route('login') }}"
                        class="text-red-600 font-medium hover:underline"
                    >
                        Masuk
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
