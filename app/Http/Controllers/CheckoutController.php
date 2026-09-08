<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $total = collect($cart)->sum(
            fn ($item) => $item['price'] * $item['quantity']
        );

        return view('checkout.create', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang masih kosong.');
        }

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'order_date' => 'required|date|after_or_equal:today',
            'notes' => 'nullable|string',
        ]);

        $total = collect($cart)->sum(
            fn ($item) => $item['price'] * $item['quantity']
        );

        $order = DB::transaction(function () use ($validated, $cart, $total) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'order_date' => $validated['order_date'],
                'total_price' => $total,
                'payment_status' => 'belum_bayar',
                'order_status' => 'menunggu',
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        $order->load('items.product');

        return view('checkout.success', compact('order'));
    }
}
