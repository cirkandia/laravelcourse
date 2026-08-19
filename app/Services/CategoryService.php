<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getAllCategories(): Collection
    {
        return Category::all();
    }

    public function getCategoryById(string $id): Category
    {
        return Category::findOrFail($id);
    }

    public function createCategory(array $data): Category
    {
        return Category::create($data);
    }

    public function updateCategory(string $id, array $data): Category
    {
        $category = Category::findOrFail($id);
        $category->update($data);

        return $category;
    }

    public function deleteCategory(string $id): void
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function getUnassignedProducts(): Collection
    {
        return Product::whereNull('category_id')->get();
    }

    public function assignProduct(string $categoryId, string $productId): void
    {
        $product = Product::findOrFail($productId);
        $product->setCategoryId($categoryId);
        $product->save();
    }
}
