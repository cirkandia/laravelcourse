<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Categories - Online Store';
        $viewData['subtitle'] = 'List of categories';
        $viewData['categories'] = Category::all();

        return view('category.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $category = Category::findOrFail($id);
        $viewData['title'] = $category->getName().' - Online Store';
        $viewData['subtitle'] = $category->getName().' - Category information';
        $viewData['category'] = $category;
        $viewData['unassigned_products'] = Product::whereNull('category_id')->get();

        return view('category.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Category';

        return view('category.create')->with('viewData', $viewData);
    }

    public function save(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Edit Category';
        $viewData['category'] = Category::findOrFail($id);

        return view('category.edit')->with('viewData', $viewData);
    }

    public function update(UpdateCategoryRequest $request, string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function delete(string $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
