<x-guest-layout>
    <div
        class="w-full max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md"
    >
        <!-- Kembali -->
        <div class="mb-4">
            <a href="javascript:history.back()" class="text-red-600 text-sm">
                &larr;
            </a>
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-center text-red-700 mb-1">Login</h2>
        <p class="text-center text-gray-600 mb-6">
            Masuk ke akun FazzDrink kamu
        </p>

        @if (session('status'))
        <div class="mb-4 text-sm text-green-600">
            {{ session("status") }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email / Username -->
            <div class="mb-4">
                <label
                    for="email"
                    class="block text-sm font-semibold text-gray-700 mb-1"
                    >Email / Username</label
                >
                <input
                    id="email"
                    type="text"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400"
                    placeholder="Masukkan email atau username"
                />
                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kata Sandi -->
            <div class="mb-6">
                <label
                    for="password"
                    class="block text-sm font-semibold text-gray-700 mb-1"
                    >Kata Sandi</label
                >
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-400"
                    placeholder="Masukkan password"
                />
                @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Masuk -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-2 rounded-lg transition"
                >
                    Masuk
                </button>
            </div>

            <!-- Lupa Password -->
            <div class="text-center mt-4">
                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-red-600 hover:underline"
                >
                    Lupa Password?
                </a>
            </div>

            <!-- Daftar -->
            <div class="text-center mt-2">
                <span class="text-sm text-gray-600">Belum punya akun?</span>
                <a
                    href="{{ route('register') }}"
                    class="text-sm text-red-600 font-medium hover:underline"
                >
                    Daftar
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
