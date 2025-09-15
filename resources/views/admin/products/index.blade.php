@extends('admin.layouts.app') @section('content')
<div class="flex justify-between mb-4">
    <h1 class="text-2xl font-bold">Products</h1>
    <a
        href="{{ route('admin.products.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded"
    >
        + Add Product
    </a>
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
            <th class="px-4 py-2 border">Image</th>
            <th class="px-4 py-2 border">Name</th>
            <th class="px-4 py-2 border">Category</th>
            <th class="px-4 py-2 border">Price</th>
            <th class="px-4 py-2 border">Stock</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td class="border px-4 py-2">{{ $product->id }}</td>
            <td class="border px-4 py-2 text-center">
                @if($product->image)
                <img
                    src="{{ Storage::url($product->image) }}"
                    alt="{{ $product->name }}"
                    class="w-16 h-16 object-cover mx-auto rounded"
                />
                @else
                <span class="text-gray-500">No image</span>
                @endif
            </td>
            <td class="border px-4 py-2">{{ $product->name }}</td>
            <td class="border px-4 py-2">
                {{ $product->category->name ?? 'N/A' }}
            </td>
            <td class="border px-4 py-2">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </td>
            <td class="border px-4 py-2">{{ $product->stock }}</td>
            <td class="border px-4 py-2">
                <a
                    href="{{ route('admin.products.edit', $product) }}"
                    class="text-blue-600"
                >
                    Edit
                </a>
                |
                <form
                    action="{{ route('admin.products.destroy', $product) }}"
                    method="POST"
                    class="inline"
                >
                    @csrf @method('DELETE')
                    <button
                        class="text-red-600"
                        onclick="return confirm('Delete this product?')"
                    >
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center p-4">No products yet.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection
