<?php

use Illuminate\Support\Facades\Route;

 use App\Http\Controllers\UserController;
 use App\Http\Controllers\Controller;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeFleurController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AdminController;

Route::get('register',[UserController::class,'showRegister'])->name('register');
Route::post('register',[UserController::class,'register'])->name('register.store');
 Route::get('login',[UserController::class,'showLogin']);
 Route::post('login',[UserController::class,'login'])->name('login');
//  products flowers :
// ajouter:
//  Route::get('add',[ProduitController::class,'create'])->name('create');
//  Route::post('add',[ProduitController::class,'store'])->name('store');
// //  afichages:
//  Route::get('products',[ProduitController::class,'index'])->name('index.gestion');
// //  delete:
//  Route::delete('products/{produit}',[ProduitController::class,'destroy'])->name('products.destroy');
// //  update:
//  Route::get('update/{produit}',[ProduitController::class,'edit'])->name('edit.product');
//  Route::put('update/{produit}',[ProduitController::class,'edit'])->name('update.product');

//  category:
Route::resource('categories', CategoryController::class);
// typelfeurs:
Route::resource('TypeFleur', TypeFleurController::class);
// flowers products:
Route::resource('Product',ProduitController::class);


 Route::get('Shop',[ProduitController::class,'shop'])->name('shop.index');
 Route::resource('Panier',PanierController::class);
//  gerer User :
Route::get('Users',[AdminController::class,'users'])->name('Users.index');
 Route::delete('Users/{userId}',[AdminController::class,'deleteUser'])->name('Users.delete');
 Route::post('Users/{userId}',[AdminController::class,'banUset'])->name('Users.ban');
 



?>