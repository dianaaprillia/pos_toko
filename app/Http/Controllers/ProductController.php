<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['store', 'update', 'destroy']),
        ];
    }

    public function index(Product $product)
    {
        return $product->with('category')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string',
            'sku'         => 'required|string|unique:products,sku',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        return Product::create($validated);
    }

    public function show(Product $product)
    {
        return $product->load('category');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|string',
            'sku'         => 'sometimes|string|unique:products,sku,' . $product->id,
            'price'       => 'sometimes|integer|min:0',
            'stock'       => 'sometimes|integer|min:0',
        ]);

        $product->update($validated);

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}