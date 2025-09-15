<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())->with('items.product')->findOrFail($id);
        return view('user.order-detail', compact('order'));
    }
}
