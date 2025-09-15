<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index()
    {
        $items = CartItem::with(['cart.user', 'product'])->paginate(10);
        return view('admin.cart_items.index', compact('items'));
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('admin.cart-items.index')->with('success', 'Cart item deleted.');
    }
}
