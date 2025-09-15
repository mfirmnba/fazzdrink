@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Category</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Price</label>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Image</label>
            @if($product->image)
                <div class="mb-2">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" class="w-full border rounded p-2" accept="image/*">
            <p class="text-gray-500 text-sm">Upload new image to replace.</p>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
