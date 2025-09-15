<x-app-layout>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">Dashboard User</h1>
        <p class="mt-2 text-gray-600">
            Selamat datang, {{ Auth::user()->name }} 👋
        </p>

        <div class="mt-4">
            <p>Email: {{ Auth::user()->email }}</p>
            <p>Role: {{ Auth::user()->role }}</p>
        </div>
    </div>
</x-app-layout>
