<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan semua produk untuk user
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    // Menampilkan detail produk untuk user
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
