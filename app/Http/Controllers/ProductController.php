<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('category', 'fruit')->get();
        return response()->json([
            'message' => 'Products retrieved successfully',
            'status' => 'success',
            'products' => $products], 
            200);
    }

     public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->code = $request->code;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'message' => 'Product created successfully',
            'status' => 'success',
            'product' => $product], 
            201);
    }

}
