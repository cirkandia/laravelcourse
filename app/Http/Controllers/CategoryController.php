<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Categories - Online Store';
        $viewData['subtitle'] = 'List of categories';
        $viewData['categories'] = $this->categoryService->getAllCategories();

        return view('category.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $category = $this->categoryService->getCategoryById($id);
        $viewData['title'] = $category->getName().' - Online Store';
        $viewData['subtitle'] = $category->getName().' - Category information';
        $viewData['category'] = $category;
        $viewData['unassigned_products'] = $this->categoryService->getUnassignedProducts();

        return view('category.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Category';

        return view('category.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $this->categoryService->createCategory($request->only(['name', 'description', 'slug', 'status']));

        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Edit Category';
        $viewData['category'] = $this->categoryService->getCategoryById($id);

        return view('category.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
        ]);

        $status = $request->has('status');
        $data = $request->only(['name', 'description', 'slug']);
        $data['status'] = $status;

        $this->categoryService->updateCategory($id, $data);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function delete(string $id): RedirectResponse
    {
        $this->categoryService->deleteCategory($id);

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }

    public function assignProduct(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $this->categoryService->assignProduct($id, $request->input('product_id'));

        return back()->with('success', 'Product assigned successfully!');
    }
}
