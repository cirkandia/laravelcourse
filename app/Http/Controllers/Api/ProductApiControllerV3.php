<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiControllerV3 extends Controller
{
    public function index(): JsonResponse
    {

        $products = new ProductCollection(Product::all());

        return response()->json($products, 200);

    }

    public function paginate(): JsonResponse
    {

        $products = new ProductCollection(Product::paginate(5));

        return response()->json($products, 200);

    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $product = new Product();
        $product->setName($request->input('name'));
        $product->setPrice($request->input('price'));
        // Si la categoría no es requerida, puedes ponerla a null o verificar si viene
        // $product->setCategoryId(null); 
        $product->save();

        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }
}
