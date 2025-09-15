<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('admin.payments.create', compact('orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'method' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Payment::create($request->all());

        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully.');
    }

    public function edit(Payment $payment)
    {
        $orders = Order::all();
        return view('admin.payments.edit', compact('payment', 'orders'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'method' => 'required|string',
            'amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $payment->update($request->all());

        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
    }
}
