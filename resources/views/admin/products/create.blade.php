@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Add Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required>
            @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold">Category</label>
            <select name="category_id" class="w-full border rounded p-2" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold">Price</label>
            <input type="number" name="price" value="{{ old('price') }}" class="w-full border rounded p-2" required>
            @error('price')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold">Stock</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border rounded p-2" required>
            @error('stock')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-semibold">Image</label>
            <input type="file" name="image" class="w-full border rounded p-2" accept="image/*">
            @error('image')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('admin.products.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</div>
@endsection
