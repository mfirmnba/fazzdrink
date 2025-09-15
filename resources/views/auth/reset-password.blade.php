<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            {{-- Tombol Kembali --}}
            <div class="mb-4">
                <a href="{{ route('login') }}" class="text-red-600 text-xl">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            {{-- Judul --}}
            <h2 class="text-3xl font-bold text-center text-red-700 mb-2">
                Reset Password
            </h2>
            <p class="text-center text-gray-600 mb-6">
                Masukkan email dan kata sandi baru kamu
            </p>

            {{-- Form --}}
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                {{-- Token --}}
                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}"
                />

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-1">
                        Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
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
                        Kata Sandi Baru
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Masukkan kata sandi baru"
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
                        placeholder="Ulangi kata sandi baru"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    @error('password_confirmation')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="mb-4">
                    <button
                        type="submit"
                        class="w-full bg-red-700 text-white font-bold py-3 rounded-xl hover:bg-red-800 transition duration-300"
                    >
                        Reset Password
                    </button>
                </div>

                {{-- Link kembali login --}}
                <div class="text-center text-sm">
                    Sudah ingat password?
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
