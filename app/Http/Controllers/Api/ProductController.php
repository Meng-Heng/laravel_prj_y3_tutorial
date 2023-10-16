<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
 
    public function show(Product $product)
    {
        return $product;
    }
 
    public function store(Request $request)
    {
        //$product = Product::create($request->all());
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
        return response()->json($product, 201);
    }
 
    public function update(Request $request, Product $product)
    {
        //$product->update($request->all());
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);
 
        return response()->json($product, 200);
    }
 
    public function delete(Product $product)
    {
        $id = $product->id;
        $product->delete();
        return response()->json($id, 200);
    }
}
