<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;  // Pastikan Address diimport
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil cart untuk user yang sedang login
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();

        // Pastikan cart tidak kosong
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong!');
        }

        return view('user.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        // Validasi input yang diperlukan
        $request->validate([
            'address'   => 'required|string|max:255',
            'latitude'  => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Ambil cart untuk user yang sedang login
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang masih kosong!');
        }

        // Buat alamat pengiriman baru jika belum ada
        $address = new Address();
        $address->address = $request->address;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->user_id = Auth::id();  // Menghubungkan alamat dengan user
        $address->save();  // Menyimpan alamat pengiriman

        // Buat Order baru dengan address_id yang sudah ada
        $order = Order::create([
            'user_id'   => Auth::id(),
            'status'    => 'pending',
            'total'     => 0,
            'address'   => $request->address,
            'latitude'  => $request->latitude,
            'longitude' => $request->longitude,
            'address_id' => $address->id,  // Menghubungkan alamat yang baru dibuat ke order
        ]);

        // Hitung total harga
        $total = 0;
        foreach ($cart->items as $item) {
            $subtotal = $item->quantity * $item->product->price;
            $total += $subtotal;

            // Simpan item ke order
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product->id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // Update total harga
        $order->update(['total' => $total]);

        // Hapus cart setelah proses checkout
        $cart->items()->delete();
        $cart->delete();

        // Siapkan pesan WhatsApp
        $message = "Halo, saya baru saja membuat pesanan dengan detail berikut:\n\n";
        foreach ($order->items as $item) {
            $message .= "- {$item->product->name} ({$item->quantity}x) Rp "
                      . number_format($item->quantity * $item->price, 0, ',', '.') . "\n";
        }
        $message .= "\nTotal: Rp " . number_format($order->total, 0, ',', '.');
        $message .= "\nAlamat: {$order->address}";

        // Menambahkan lokasi jika tersedia
        if ($order->latitude && $order->longitude) {
            $message .= "\nLokasi Maps: https://www.google.com/maps?q={$order->latitude},{$order->longitude}";
        }

        // Pesan tidak menampilkan cabang, hanya mengarahkan ke WhatsApp
        $message .= "\n\nKode Pesanan: #{$order->id}";

        // Nomor WhatsApp default
        $whatsappNumber = "6281234567890";  // Nomor default untuk WhatsApp
        $url = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);

        // Redirect ke WhatsApp
        return redirect()->away($url);
    }
}
