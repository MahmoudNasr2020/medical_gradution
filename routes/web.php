<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController;
use App\Http\Controllers\Site\Checkout\CheckoutController;
use App\Http\Controllers\Site\Checkout\InvoiceController;
use App\Http\Controllers\Site\Company\CompanyController;
use App\Http\Controllers\Site\Favourite\FavouriteController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\Product\ProductController;
use App\Http\Controllers\Site\User\OrderController;
use Illuminate\Support\Facades\Route;

//route home
Route::get('/',[HomeController::class,'index'])->name('home');

//route Category
Route::get('/category/{id}/{name?}',[CategoryController::class,'index'])->name('category.index');

//route Company
Route::get('/company/{id}/{name?}',[CompanyController::class,'index'])->name('company.index');

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
    Route::get('invoice/{order_id}/{name?}',[InvoiceController::class,'invoice'])->name('invoice'); //callback payment

    //user route
    Route::get('/orders/{id}/{name?}', [OrderController::class,'index'])->name('order.index'); //orders


    //user route
    Route::get('favourite/{id}/{name?}', [FavouriteController::class,'index'])->name('favourite.index'); //checkout
    Route::post('/favourite/store', [FavouriteController::class,'store'])->name('favourite.store'); //favourite
    Route::post('/favourite/delete', [FavouriteController::class,'delete'])->name('favourite.delete'); //delete favourite

});

