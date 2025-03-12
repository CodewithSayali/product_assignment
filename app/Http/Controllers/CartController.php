<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
class CartController extends Controller
{
    public function addToCart(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        CartItem::create([
            'product_id' => $request->product_id,
            'user_id' => 1, // Hardcoded user ID
            'quantity' => $request->quantity
        ]);

        return response()->json(['message' => 'Product added to cart']);
    }

    public function viewCart() {
        return response()->json(CartItem::with('product')->where('user_id', 1)->get());
    }
}
