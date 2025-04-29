<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller('App\Http\Controllers\Api\CategoryController')->group(function () {
    Route::get('categories', 'all');
    Route::get('category/{id}', 'show');
});

Route::controller('App\Http\Controllers\Api\ProductController')->group(function () {
    Route::get('product/{id}', 'show');
});
