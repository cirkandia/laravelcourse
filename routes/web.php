<?php

use Illuminate\Support\Facades\Route;

$PathController = 'App\Http\Controllers\\';

Route::get('/', $PathController.'HomeController@index')->name('home.index');
Route::get('/about', $PathController.'HomeController@about')->name('home.about');
Route::get('/products', $PathController.'ProductController@index')->name('product.index');
Route::get('/products/create', $PathController.'ProductController@create')->name('product.create');
Route::post('/products/save', $PathController.'ProductController@save')->name('product.save');
Route::get('/products/{id}', $PathController.'ProductController@show')->name('product.show');
