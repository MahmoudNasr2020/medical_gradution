<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController;
use App\Http\Controllers\Site\Checkout\CheckoutController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\Product\ProductController;
use Illuminate\Support\Facades\Route;

//route home
Route::get('/',[HomeController::class,'index'])->name('home');

//route Category
Route::get('/category/{id}/{name?}',[CategoryController::class,'index'])->name('category.index');

//route product
Route::get('product/{id}/{name?}',[ProductController::class,'index'])->name('product.index');
Route::post('/getProduct',[ProductController::class,'getProduct'])->name('product.getProduct');

//route guest
Route::group(['middleware'=>'guest'],function (){

    //register user
    Route::get('/register',[RegisterController::class,'indexUser'])->name('registerUser');
    Route::post('/register',[RegisterController::class,'registerUser'])->name('register.store');

    //login user
    Route::get('/login',[LoginController::class,'indexUser'])->name('loginUser');
    Route::post('/login',[LoginController::class,'loginUser'])->name('login.store');
});

//auth user route
Route::group(['middleware'=>'auth'],function () {
     //logout user route
    Route::post('logout',[LoginController::class,'logoutUser'])->name('logout');

    //cart route
    Route::get('cart/{id}/{name?}',[CartController::class,'index'])->name('cart.index'); //carts
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store'); //add to cart
    Route::post('cart/update',[CartController::class,'update'])->name('cart.update'); //update cart
    Route::post('cart/delete',[CartController::class,'delete'])->name('cart.delete'); //delete cart

    //checkout
    Route::get('checkout/{id}/{name?}', [CheckoutController::class,'index'])->name('checkout.index'); //checkout
    Route::post('checkoutPay', [CheckoutController::class,'pay'])->name('checkout.pay'); //checkout pay
    Route::get('/payment/callback',[CheckoutController::class,'callback'])->name('callback'); //callback payment

});

