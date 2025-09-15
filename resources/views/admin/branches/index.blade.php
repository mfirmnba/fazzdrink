@extends('admin.layouts.app') @section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Daftar Cabang</h1>
    <a
        href="{{ route('admin.branches.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
    >
        + Tambah Cabang
    </a>
</div>

@if(session('success'))
<div class="bg-green-200 text-green-800 p-3 rounded mb-4">
    {{ session("success") }}
</div>
@endif

<table class="w-full border border-gray-200 rounded overflow-hidden">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Nama Cabang</th>
            <th class="px-4 py-2 border">Alamat</th>
            <th class="px-4 py-2 border">Latitude</th>
            <th class="px-4 py-2 border">Longitude</th>
            <th class="px-4 py-2 border">WhatsApp</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($branches as $branch)
        <tr class="hover:bg-gray-50">
            <td class="border px-4 py-2">{{ $branch->id }}</td>
            <td class="border px-4 py-2">{{ $branch->name }}</td>
            <td class="border px-4 py-2">{{ $branch->address }}</td>
            <td class="border px-4 py-2">{{ $branch->latitude }}</td>
            <td class="border px-4 py-2">{{ $branch->longitude }}</td>
            <td class="border px-4 py-2">{{ $branch->whatsapp_number }}</td>
            <td class="border px-4 py-2">
                <a
                    href="{{ route('admin.branches.edit', $branch) }}"
                    class="text-blue-600 hover:underline"
                    >Edit</a
                >
                |
                <form
                    action="{{ route('admin.branches.destroy', $branch) }}"
                    method="POST"
                    class="inline"
                >
                    @csrf @method('DELETE')
                    <button
                        class="text-red-600 hover:underline"
                        onclick="return confirm('Hapus cabang ini?')"
                    >
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center p-4 text-gray-500">
                Belum ada cabang.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{-- Jika menggunakan pagination --}}
    {{-- {{ $branches->links() }} --}}
</div>
@endsection
