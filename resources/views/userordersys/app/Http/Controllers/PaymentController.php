<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function process(Order $order)
    {
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Payment processing logic here
        $payment = Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total_amount,
            'payment_method' => 'stripe', // You can make this dynamic
            'status' => 'pending',
        ]);

        return view('payments.process', compact('order', 'payment'));
    }
}

// app/Http/Controllers/AccountController.php
class AccountController extends Controller
{
    public function settings()
    {
        return view('account.settings');
    }
    
    public function update(Request $request)
    {
        // Account update logic
    }
}