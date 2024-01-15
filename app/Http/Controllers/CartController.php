<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $cart = session()->get('cart', []);
        $cart[] = $product;
        session(['cart' => $cart]);

        return redirect()->route('homeWithOut')->with('success', 'Product added to cart successfully');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        $consolidatedCart = [];

        // Consolidate items with the same ID
        foreach ($cart as $product) {
            $productId = $product['id'];

            if (isset($consolidatedCart[$productId])) {
                // Product already exists in the consolidated cart, update quantity
                $consolidatedCart[$productId]['quantity'] += 1;
            } else {
                // Add a new entry to the consolidated cart
                $product['quantity'] = 1;
                $consolidatedCart[$productId] = $product;
            }
        }

        return view('web.components.cart', ['cart' => $consolidatedCart]);
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }

        return redirect()->route('cart')->with('success', 'Product removed from cart successfully');
    }
}
