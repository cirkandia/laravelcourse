<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getAllProducts(): Collection
    {
        return Product::all();
    }

    public function getProductById(string $id): Product
    {
        return Product::findOrFail($id);
    }

    public function createProduct(array $data): Product
    {
        return Product::create($data);
    }
}
