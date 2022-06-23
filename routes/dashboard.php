<?php

use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Budget\BudgetController;
use App\Http\Controllers\Dashboard\Category\CategoryController;
use App\Http\Controllers\Dashboard\Company\CompanyController;
use App\Http\Controllers\Dashboard\Contact\ContactController;
use App\Http\Controllers\Dashboard\Order\OrderController;
use App\Http\Controllers\Dashboard\Product\ProductController;
use App\Http\Controllers\Dashboard\Profile\ProfileController;
use App\Http\Controllers\Dashboard\Setting\SettingController;
use App\Http\Controllers\Dashboard\User\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>'guest:admin'],function (){
    Route::view('login','dashboard.pages.auth.login')->name('login.index');
    Route::post('login',[LoginController::class,'login'])->name('login.check');

});

Route::group(['middleware'=>'auth:admin'],function (){

    //logout company
    Route::post('logout',[LoginController::class,'logout'])->name('logout');

    //home company
    Route::view('home','dashboard.home')->name('home');

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
    Route::get('companies/show/{id}', [CompanyController::class,'show'])->name('company.show');
    Route::get('company/showProduct/{id}', [CompanyController::class,'showProduct'])->name('company.product.show');
    Route::delete('company/destroy/{id}', [CompanyController::class,'destroy'])->name('company.destroy');
    Route::delete('company/showProduct/destroy/{id}', [CompanyController::class,'destroyProduct'])->name('company.product.destroy');
    Route::get('company/{id}/products', [CompanyController::class,'prodcuts'])->name('company.products');


//orders
    Route::get('orders',[OrderController::class,'index'])->name('order.index');


//settings
    Route::view('settings','dashboard.pages.setting.setting')->name('setting.index');
    Route::post('settings/update', [SettingController::class,'update'])->name('setting.update');

    //contact
    Route::view('contacts','dashboard.pages.contact.contact')->name('contact.index');
    Route::get('company/show/{id}', [ContactController::class,'show'])->name('contact.show');


    //admin route
    Route::get('admins', [AdminController::class,'index'])->name('admin.index');;
    Route::get('admin/create', [AdminController::class,'create'])->name('admin.create');
    Route::post('admin/store', [AdminController::class,'store'])->name('admin.store');
    Route::get('admin/show/{id}', [AdminController::class,'show'])->name('admin.show');
    Route::get('admin/edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
    Route::post('admin/update/{id}', [AdminController::class,'update'])->name('admin.update');
    Route::delete('admin/destroy/{id}', [AdminController::class,'destroy'])->name('admin.destroy');


    //profile
    Route::view('profile', 'dashboard.pages.profile.index')->name('profile.index');
    Route::view('profile/edit', 'dashboard.pages.profile.edit')->name('profile.edit');
    Route::post('profile/profile/{id}', [ProfileController::class,'update'])->name('profile.update');

    Route::get('budget', [BudgetController::class,'budget'])->name('budget.index');


});
