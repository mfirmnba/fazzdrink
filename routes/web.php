<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CartItemController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BranchController as AdminBranchController; // Alias untuk Admin\BranchController
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\DashboardController;
use App\Models\Product;
use App\Models\Category;
// ====================
// Halaman utama (welcome)
// ====================
Route::get('/', function () {
    $categories = Category::all();
    return view('welcome', compact('categories'));
})->name('home');

// ====================
// Halaman About Us (Profil Perusahaan)
// ====================
Route::get('/about', function () {
    return view('user.about'); // arahkan ke resources/views/about.blade.php
})->name('about');

Route::get('/how-it-works', function () {
    return view('user.how-it-works');
})->name('how.it.works');

// ====================
// Dashboard umum (redirect sesuai role)
// ====================
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ====================
// Group untuk user biasa
// ====================
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // Profil user
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Dashboard user
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

    // Produk
    Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [UserProductController::class, 'show'])->name('products.show');

    // Cart
    Route::get('/cart', [UserCartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [UserCartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [UserCartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [UserCartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [UserCartController::class, 'clear'])->name('cart.clear');
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Pesanan Saya
    Route::get('/orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [UserOrderController::class, 'show'])->name('orders.show');
    // Halaman Menu (Frontend User)
    Route::get('/menu', [UserProductController::class, 'index'])->name('menu');
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    
    Route::get('/get-address', [CheckoutController::class, 'getAddress'])->name('get.address');
});

// ====================
// Group untuk admin
// ====================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        // Resource CRUD
        Route::resource('orders', OrderController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('carts', CartController::class)->only(['index', 'show', 'destroy']);
        Route::resource('cart-items', CartItemController::class)->only(['index', 'destroy']);
        Route::resource('order-items', OrderItemController::class)->only(['index', 'destroy']);
        Route::resource('reviews', ReviewController::class)->only(['index', 'show', 'destroy']);
        Route::resource('addresses', AddressController::class);
        Route::resource('branches', AdminBranchController::class); // Admin BranchController
    });

// ====================
// Auth routes (Breeze/Fortify/etc.)
// ====================
require __DIR__.'/auth.php';

// ====================
// Route untuk Profile
// ====================

// Halaman Profil untuk User
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// Halaman Edit Profil User
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
