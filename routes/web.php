<?php

use Illuminate\Support\Facades\Route;

$PathController = 'App\Http\Controllers\\';

Route::get('/', $PathController . 'HomeController@index')->name('home.index');
Route::get('/about', $PathController . 'HomeController@about')->name('home.about');
Route::get('/products', $PathController . 'ProductController@index')->name('product.index');
Route::get('/products/create', $PathController . 'ProductController@create')->name('product.create');
Route::post('/products/save', $PathController . 'ProductController@save')->name('product.save');
Route::get('/products/{id}', $PathController . 'ProductController@show')->name('product.show');

Route::get('/categories', $PathController . 'CategoryController@index')->name('category.index');
Route::get('/categories/create', $PathController . 'CategoryController@create')->name('category.create');
Route::post('/categories/save', $PathController . 'CategoryController@save')->name('category.save');
Route::get('/categories/{id}/edit', $PathController . 'CategoryController@edit')->name('category.edit');
Route::post('/categories/{id}/update', $PathController . 'CategoryController@update')->name('category.update');
Route::post('/categories/{id}/delete', $PathController . 'CategoryController@delete')->name('category.delete');
Route::post('/categories/{id}/assign-product', $PathController . 'CategoryController@assignProduct')->name('category.assign');
Route::get('/categories/{id}', $PathController . 'CategoryController@show')->name('category.show');
