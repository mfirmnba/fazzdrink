<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Review;
use App\Models\CartItem;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalOrders = Order::count();
        $totalPayments = Payment::count();
        $totalReviews = Review::count();
        $totalCartItems = CartItem::sum('quantity'); // ✅ total semua quantity

        $latestOrders = Order::with('user')->latest()->take(5)->get();

        $latestCartItems = CartItem::with(['cart.user', 'product'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalCategories',
            'totalOrders',
            'totalPayments',
            'totalReviews',
            'totalCartItems',  
            'latestOrders',
            'latestCartItems'
        ));
    }
}
