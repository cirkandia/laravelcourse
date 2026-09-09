<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ImageNotDIController;
use App\Http\Controllers\HumanController;

// Home Routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/save', [ProductController::class, 'save'])->name('product.save');
Route::post('/products/assign-category', [ProductController::class, 'assignCategory'])->name('product.assignCategory');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

// Category Routes
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/save', [CategoryController::class, 'save'])->name('category.save');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::post('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name("cart.index");
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name("cart.add");
Route::get('/cart/removeAll/', [CartController::class, 'removeAll'])->name("cart.removeAll");

// Image Upload Routes (with Dependency Injection)
Route::get('/image', [ImageController::class, 'index'])->name("image.index");
Route::post('/image/save', [ImageController::class, 'save'])->name("image.save");

// Image Upload Routes (without Dependency Injection)
Route::get('/image-not-di', [ImageNotDIController::class, 'index'])->name("imagenotdi.index");
Route::post('/image-not-di/save', [ImageNotDIController::class, 'save'])->name("imagenotdi.save");

// Human Routes
Route::get('/humans/primeros', [HumanController::class, 'primeros'])->name('humans.primeros');
Route::get('/humans', [HumanController::class, 'index'])->name('humans.index');
Route::get('/humans/create', [HumanController::class, 'create'])->name('humans.create');
Route::post('/humans', [HumanController::class, 'store'])->name('humans.store');
Route::get('/humans/{human}', [HumanController::class, 'show'])->name('humans.show');
Route::get('/humans/{human}/edit', [HumanController::class, 'edit'])->name('humans.edit');
Route::put('/humans/{human}', [HumanController::class, 'update'])->name('humans.update');
Route::delete('/humans/{human}', [HumanController::class, 'destroy'])->name('humans.destroy');
