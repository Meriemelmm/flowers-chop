<?php

use Illuminate\Support\Facades\Route;

 use App\Http\Controllers\UserController;
 use App\Http\Controllers\Controller;
use App\Http\Controllers\ProduitController;

Route::get('register',[UserController::class,'showRegister'])->name('register');
Route::post('register',[UserController::class,'register'])->name('register.store');
 Route::get('login',[UserController::class,'showLogin']);
 Route::post('login',[UserController::class,'login'])->name('login');
 Route::get('add',[ProduitController::class,'create'])->name('create');
 Route::post('add',[ProduitController::class,'store'])->name('store');
 Route::get('products',[ProduitController::class,'index'])->name('index.gestion');
 Route::post('products/{produit}',[ProduitController::class,'destroy'])->name('products.destroy');



?>