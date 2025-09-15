<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $items = OrderItem::with(['order.user', 'product'])->paginate(10);
        return view('admin.order_items.index', compact('items'));
    }

    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('admin.order-items.index')->with('success', 'Order item deleted.');
    }
}
