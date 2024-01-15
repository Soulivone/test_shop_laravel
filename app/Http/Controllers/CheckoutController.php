<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    private $checkoutService;
    public function __construct(CheckoutService $checkoutService)
    {
        $this->checkoutService = $checkoutService;
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            // dd($request->all());
            // Access the authenticated user
            $user = auth()->user();

            // Access the cart data from the session
            $carts = session('cart', []);

            foreach ($carts as $cart) {
                $orderItem = [
                    'order_id' => 0,
                    'product_id' => $cart->id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price
                ];
            }

            $order = [
                'user_id' => $user->id,
                'status' => 'pending',
                'total_price' => $orderItem['price'] * $orderItem['quantity']
            ];

            $this->checkoutService->add($order, $orderItem);

            // Redirect or perform any other actions as needed
            return redirect()->route('homeWithOut')->with('success', 'Order placed successfully!');
        } else {
            return redirect()->route('login');
        }
    }
}
