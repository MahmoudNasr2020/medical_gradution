<?php

use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Company\CompanyController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\User\UserController;
use Illuminate\Support\Facades\Route;

//category route
Route::resource('category', CategoryController::class);

//product route
Route::get('product', [ProductController::class,'index'])->name('product.index');
Route::get('product/show/{id}', [ProductController::class,'show'])->name('product.show');
Route::delete('product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');

//user route
Route::get('users', [UserController::class,'index'])->name('user.index');
Route::get('user/{id}/order', [UserController::class,'orders'])->name('user.orders');
Route::get('user/show/{id}', [UserController::class,'show'])->name('user.show');
Route::delete('user/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
Route::post('user/status', [UserController::class,'status'])->name('user.status');
Route::get('invoice/{order_id}/{name?}',[UserController::class,'invoice'])->name('user.invoice');


//company route
Route::get('companies', [CompanyController::class,'index'])->name('company.index');
Route::get('company/show/{id}', [CompanyController::class,'show'])->name('company.show');
Route::get('company/showProduct/{id}', [CompanyController::class,'showProduct'])->name('company.product.show');
Route::delete('company/destroy/{id}', [CompanyController::class,'destroy'])->name('company.destroy');
Route::delete('company/showProduct/destroy/{id}', [CompanyController::class,'destroyProduct'])->name('company.product.destroy');
Route::get('company/{id}/products', [CompanyController::class,'prodcuts'])->name('company.products');


