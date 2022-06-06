<?php

use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use Illuminate\Support\Facades\Route;

//category route
Route::resource('category', CategoryController::class);

//product route
Route::get('product', [ProductController::class,'index']);
Route::get('product/show/{id}', [ProductController::class,'show']);
Route::delete('product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');

