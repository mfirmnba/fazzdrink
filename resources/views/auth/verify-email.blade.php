<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
            {{-- Judul --}}
            <h2 class="text-3xl font-bold text-center text-red-700 mb-2">
                Verifikasi Email
            </h2>

            {{-- Penjelasan --}}
            <p class="text-sm text-gray-700 text-center mb-6">
                Terima kasih telah mendaftar! Sebelum melanjutkan, silakan
                verifikasi alamat email kamu melalui link yang kami kirim. Jika
                belum menerima email, kamu bisa kirim ulang.
            </p>

            {{-- Status sukses kirim ulang --}}
            @if (session('status') === 'verification-link-sent')
            <div class="mb-4 text-green-600 text-sm font-semibold text-center">
                Link verifikasi baru telah dikirim ke email kamu.
            </div>
            @endif

            {{-- Tombol Kirim Ulang & Logout --}}
            <div class="flex flex-col space-y-4">
                {{-- Resend Email Verification --}}
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full bg-red-700 text-white font-bold py-3 rounded-xl hover:bg-red-800 transition"
                    >
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                {{-- Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full text-sm text-gray-600 hover:text-red-600 underline"
                    >
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
