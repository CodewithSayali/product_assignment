<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('images')->get());
    }
    // public function store(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'price' => 'required|numeric',
    //         'product_image' => 'required|array',
    //         'product_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     $product = Product::create([
    //         'name' => $request->name,
    //         'price' => $request->price
    //     ]);

    //     foreach ($request->file('product_image') as $image) {
    //         $path = $image->store('product_image', 'public');
    //         ProductImage::create([
    //             'product_id' => $product->id,
    //             'product_image' => $path
    //         ]);
    //     }

    //     return response()->json(['message' => 'Product created successfully']);
    // }

    public function store(Request $request)
    {
        DB::enableQueryLog(); // Start logging queries

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'product_image' => 'required|array',
            'product_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        foreach ($request->file('product_image') as $image) {
            $path = $image->store('product_image', 'public');
            ProductImage::create([
                'product_id' => $product->id,
                'product_image' => $path
            ]);
        }

        // Show executed SQL query
        dd(DB::getQueryLog());

        return response()->json(['message' => 'Product created successfully']);
    }
}
