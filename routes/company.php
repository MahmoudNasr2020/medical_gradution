<?php

use App\Http\Controllers\Site\Company\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

//route guest
Route::group(['middleware'=>'guest'],function (){

    //register company
    Route::post('/register',[RegisterController::class,'registerCompany'])->name('register.store');

    //login company
    Route::post('/login',[LoginController::class,'loginUser'])->name('login.store');
});
