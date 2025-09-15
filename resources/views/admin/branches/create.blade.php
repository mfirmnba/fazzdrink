@extends('admin.layouts.app') @section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Tambah Cabang Baru</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.branches.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nama Cabang</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full border px-3 py-2 rounded"
                required
            />
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Alamat</label>
            <textarea
                name="address"
                class="w-full border px-3 py-2 rounded"
                required
                >{{ old("address") }}</textarea
            >
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block font-semibold mb-1">Latitude</label>
                <input
                    type="number"
                    step="any"
                    name="latitude"
                    value="{{ old('latitude') }}"
                    class="w-full border px-3 py-2 rounded"
                    required
                />
            </div>
            <div>
                <label class="block font-semibold mb-1">Longitude</label>
                <input
                    type="number"
                    step="any"
                    name="longitude"
                    value="{{ old('longitude') }}"
                    class="w-full border px-3 py-2 rounded"
                    required
                />
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">WhatsApp</label>
            <input
                type="text"
                name="whatsapp_number"
                value="{{ old('whatsapp_number') }}"
                class="w-full border px-3 py-2 rounded"
                required
            />
        </div>

        <div class="flex justify-end">
            <a
                href="{{ route('admin.branches.index') }}"
                class="mr-2 px-4 py-2 rounded border hover:bg-gray-100"
                >Batal</a
            >
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
            >
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
