<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Exception;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        try {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        CartItem::create([
            'product_xid' => $request->product_id,
            'user_id' => 1, // Hardcoded user ID
            'quantity' => $request->quantity
        ]);

        return response()->json(['message' => 'Product added to cart'], 200);
    } catch (Exception $e) {
        Log::error("An error occurred in " . __METHOD__ . ": " . $e->getMessage());
        return response()->json(['message' => 'Error in creating product'], 500);
    }
    }

    public function viewCart() {
        $cartItems = CartItem::with('product')->where('user_id', 1)->get();
        return view('welcome', compact('cartItems'));

    }
}
