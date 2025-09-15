<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil semua kategori beserta produk-produknya
        $categories = Category::with('products')->get();

        return view('user.products.index', compact('categories'));

        $products = Product::all();
        return view('user.menu', compact('products')); // arahkan ke view baru
    }

    public function show($id)
    {
        // Ambil detail produk berdasarkan ID
        $product = Product::with('category')->findOrFail($id);

        return view('user.products.show', compact('product'));
    }
}
