<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller('App\Http\Controllers\Dashboard\CategoryController')->group(function () {
   Route::get('categories', 'index')->name('category.index');
   Route::get('category/create', 'create')->name('category.create');
   Route::put('category/update/{id}', 'update')->name('category.update');

    Route::get('category/show/{id}', 'show')->name('category.show');
    Route::get('category/edit/{id}', 'edit')->name('category.edit');
    Route::delete('category/delete/{id}', 'destroy')->name('category.delete');
    Route::post('category/store', 'store')->name('category.store');
});



Route::controller('App\Http\Controllers\Dashboard\ProductController')->group(function () {
    Route::get('products', 'index')->name('product.index');
    Route::get('product/create', 'create')->name('product.create');
    Route::put('product/update/{id}', 'update')->name('product.update');

    Route::get('product/show/{id}', 'show')->name('product.show');
    Route::get('product/edit/{id}', 'edit')->name('product.edit');
    Route::delete('product/delete/{id}', 'destroy')->name('product.delete');
    Route::post('product/store', 'store')->name('product.store');
});


Route::controller('App\Http\Controllers\Dashboard\OrderController')->group(function () {
    Route::get('orders', 'index')->name('order.index');
    Route::get('order/create', 'create')->name('order.create');
    Route::get('order/show/{id}', 'show')->name('order.show');
    Route::get('order/update/{id}', 'update')->name('order.update');


});
