<?php

use Illuminate\Support\Facades\Route;

 use App\Http\Controllers\UserController;
 use App\Http\Controllers\Controller;


Route::get('register',[UserController::class,'showRegister'])->name('register');
Route::post('register',[UserController::class,'register'])->name('register.store');
 Route::get('login',[UserController::class,'showLogin']);
 Route::post('login',[UserController::class,'login'])->name('login');




?>