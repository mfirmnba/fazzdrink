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
                Konfirmasi Password
            </h2>
            <p class="text-center text-gray-600 mb-6 text-sm">
                Ini adalah area aman. Mohon masukkan password kamu untuk
                melanjutkan.
            </p>

            {{-- Form --}}
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                {{-- Password --}}
                <div class="mb-6">
                    <label for="password" class="block font-semibold mb-1">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Masukkan password kamu"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                    />
                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div>
                    <button
                        type="submit"
                        class="w-full bg-red-700 text-white font-bold py-3 rounded-xl hover:bg-red-800 transition duration-300"
                    >
                        Konfirmasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
