<?php

use App\Http\Controllers\Company\Auth\LoginController;
use App\Http\Controllers\Company\Auth\RegisterController;
use App\Http\Controllers\Company\Order\OrderController;
use App\Http\Controllers\Company\Product\ProductController;
use App\Http\Controllers\Company\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

//route guest
Route::group(['middleware'=>'guest:company'],function (){

    //register company
    Route::post('/register',[RegisterController::class,'registerCompany'])->name('register.store');

    //login company
    Route::post('/login',[LoginController::class,'loginCompany'])->name('login.store');
});



//route auth
Route::group(['middleware'=>'auth:company'],function (){

    //home company
    Route::view('home','company.home')->name('home');

    //logout company
    Route::post('logout',[LoginController::class,'logoutCompany'])->name('logout');

    //product route
    Route::get('product', [ProductController::class,'index'])->name('product.index');;
    Route::get('product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('product/store', [ProductController::class,'store'])->name('product.store');
    Route::get('product/show/{id}', [ProductController::class,'show'])->name('product.show');
    Route::get('product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('product/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::delete('product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');



    Route::get('orders', [OrderController::class,'index'])->name('orders.index');
    Route::get('budget', [OrderController::class,'budget'])->name('budget.index');

    //profile
    Route::view('profile', 'company.pages.profile.index')->name('profile.index');
    Route::view('profile/edit', 'company.pages.profile.edit')->name('profile.edit');
    Route::post('profile/profile/{id}', [ProfileController::class,'update'])->name('profile.update');
});
