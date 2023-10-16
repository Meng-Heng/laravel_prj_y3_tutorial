<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class,'index']);
Route::get('products/{product}', [ProductController::class,'show']);
Route::post('products', [ProductController::class,'store']);
Route::put('products/{product}', [ProductController::class,'update']);
Route::delete('products/{product}', [ProductController::class,'delete']);

// Select
Route::get('/category', [CategoryController::class, 'index'])->name("category.index")->middleware('api_user');;
// Create
Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");
Route::post('/category', [CategoryController::class, 'store'])->name("category.store");
// Edit
Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');
Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');
// Delete
Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');
// Detail
Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");
