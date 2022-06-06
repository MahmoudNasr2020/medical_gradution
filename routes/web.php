<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\Category\CategoryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\Product\ProductController;
use Illuminate\Support\Facades\Route;

//route home
Route::get('/',[HomeController::class,'index'])->name('home');

//route Category
Route::get('/category/{id}/{name?}',[CategoryController::class,'index'])->name('category.index');

//route product
Route::post('/getProduct',[ProductController::class,'getProduct'])->name('product.index');

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
});

