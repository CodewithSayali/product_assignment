<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;



class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('images')->get());
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'product_image' => 'required|array',
                'product_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            DB::beginTransaction();

            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price
            ]);

            foreach ($request->file('product_image') as $image) {
                $path = $image->store('product_image', 'public');
                ProductImage::create([
                    'product_xid' => $product->id,
                    'product_image' => $path
                ]);
            }
            DB::commit();
            return response()->json(['message' => 'Product created successfully'], 200);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("An error occurred in " . __METHOD__ . ": " . $e->getMessage());
            return response()->json(['message' => 'Error in creating product'], 500);
        }
    }
}
