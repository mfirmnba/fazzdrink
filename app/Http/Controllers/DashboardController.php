<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data untuk dashboard
        $productsCount   = Product::count();
        $categoriesCount = Category::count();
        $cartsCount      = Cart::where('status', 'pending')->count();
        $totalOrders     = Order::count();
        $totalSales      = Order::where('status', 'completed')->sum('total_price');
        $totalPayments   = Payment::sum('amount');
        $totalUsers      = User::count();
        $totalProducts   = Product::count();

        // Kirim semua data ke view dashboard
        return view('admin.dashboard', compact(
            'productsCount',
            'categoriesCount',
            'cartsCount',
            'totalOrders',
            'totalSales',
            'totalPayments',
            'totalUsers',
            'totalProducts'
        ));
    }
}
