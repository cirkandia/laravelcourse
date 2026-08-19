<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = $this->productService->getAllProducts();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = $this->productService->getProductById($id);
        $viewData['title'] = $product->getName().' - Online Store';
        $viewData['subtitle'] = $product->getName().' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ]);

        $this->productService->createProduct($request->only(['name', 'price']));

        return back()->with('success', 'Product created successfully!');
    }
}
