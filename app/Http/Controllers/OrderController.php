<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product; 
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $orders = $user->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
    
    public function create()
    {
        return view('orders.create');
    }
    
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:500',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Generate unique order ID
        $orderPrefix = 'ORD-' . date('Ymd') . '-';
        $lastOrder = Order::where('id', 'like', $orderPrefix . '%')->orderBy('id', 'desc')->first();
        
        if ($lastOrder) {
            $lastNumber = intval(substr($lastOrder->id, -4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }
        
        $orderId = $orderPrefix . $newNumber;

        // Calculate totals
        $subtotal = 0;
        $orderItems = [];

        foreach ($validatedData['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            $itemTotal = $product->price * $item['quantity'];
            $subtotal += $itemTotal;

            $orderItems[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $product->price,
            ];
        }

        $tax = $subtotal * 0.1;
        $shipping = 10;
        $total = $subtotal + $tax + $shipping;

        // Create order
        $order = Order::create([
            'id' => $orderId,
            'customer_name' => $validatedData['customer_name'],
            'customer_email' => $validatedData['customer_email'],
            'customer_phone' => $validatedData['customer_phone'],
            'customer_address' => $validatedData['customer_address'],
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'subtotal' => $subtotal,
            'tax' => $tax,
            'shipping' => $shipping,
            'total_amount' => $total,
        ]);

        // Create order items
        foreach ($orderItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);
        }

        // Check if it's an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'orderId' => $orderId,
                'message' => 'Order created successfully'
            ]);
        }

        // Redirect for non-AJAX requests
        return redirect()->route('orders.show', $order)
            ->with('success', 'Order created successfully. Order ID: ' . $orderId);
    }
    
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
