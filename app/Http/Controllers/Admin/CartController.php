<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Menampilkan semua cart dengan pagination
     */
    public function index()
    {
        $carts = Cart::with('user')->latest()->paginate(10);
        return view('admin.carts.index', compact('carts'));
    }

    /**
     * Menampilkan detail cart tertentu
     */
    public function show(Cart $cart)
    {
        $cart->load(['items.product', 'user']);
        return view('admin.carts.show', compact('cart'));
    }

    /**
     * Menghapus cart tertentu
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();
            return redirect()->route('admin.carts.index')
                ->with('success', 'Cart berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.carts.index')
                ->with('error', 'Cart gagal dihapus. ' . $e->getMessage());
        }
    }
}
