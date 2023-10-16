<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }
 
    public function show(Category $category)
    {
        return $category;
    }
 
    public function store(Request $request)
    {
        //$product = Product::create($request->all());
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json($category, 201);
    }
 
    public function update(Request $request, Product $product)
    {
        //$product->update($request->all());
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
 
        return response()->json($category, 200);
    }
 
    public function delete(Category $category)
    {
        $id = $category->id;
        $category->delete();
        return response()->json($id, 200);
    }
}
