@extends('admin.layouts.app') @section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Categories</h1>
    <a
        href="{{ route('admin.categories.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded"
        >+ Add Category</a
    >
</div>

@if(session('success'))
<div class="bg-green-200 text-green-800 p-3 rounded mb-4">
    {{ session("success") }}
</div>
@endif

<table class="w-full border">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border">ID</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td class="border px-4 py-2">{{ $category->id }}</td>
            <td class="border px-4 py-2">{{ $category->name }}</td>
            <td class="border px-4 py-2">
                <a
                    href="{{ route('admin.categories.edit', $category) }}"
                    class="text-blue-600"
                    >Edit</a
                >
                |
                <form
                    action="{{ route('admin.categories.destroy', $category) }}"
                    method="POST"
                    class="inline"
                >
                    @csrf @method('DELETE')
                    <button
                        class="text-red-600"
                        onclick="return confirm('Delete this category?')"
                    >
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center p-4">No categories yet.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $categories->links() }}
@endsection
