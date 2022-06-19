<?php

use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\User\UserController;
use Illuminate\Support\Facades\Route;

//category route
Route::resource('category', CategoryController::class);

//product route
Route::get('product', [ProductController::class,'index']);
Route::get('product/show/{id}', [ProductController::class,'show'])->name('product.show');
Route::delete('product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');

//user route
Route::get('users', [UserController::class,'index']);
Route::get('user/{id}/order', [UserController::class,'orders'])->name('user.orders');
Route::get('user/show/{id}', [UserController::class,'show'])->name('user.show');
Route::delete('user/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
Route::post('user/status', [UserController::class,'status'])->name('user.status');
