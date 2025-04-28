<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeFleurController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AdminController;


    Route::get('register', [UserController::class, 'showRegister'])->name('register');
    Route::post('register', [UserController::class, 'register'])->name('register.store');
    Route::get('login', [UserController::class, 'showLogin'])->name('login.show');
    Route::post('login', [UserController::class, 'login'])->name('login');


// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Products Flowers
    // Route::get('add', [ProduitController::class, 'create'])->name('create');
    // Route::post('add', [ProduitController::class, 'store'])->name('store');
    // Route::get('products', [ProduitController::class, 'index'])->name('index.gestion');
    // Route::delete('products/{produit}', [ProduitController::class, 'destroy'])->name('products.destroy');
    // Route::get('update/{produit}', [ProduitController::class, 'edit'])->name('edit.product');
    // Route::put('update/{produit}', [ProduitController::class, 'update'])->name('update.product');

    Route::resource('categories', CategoryController::class);
    Route::resource('TypeFleur', TypeFleurController::class);
    Route::resource('Product', ProduitController::class);
    Route::post('/payement', [PanierController::class, 'payement'])->name('payement');
    Route::get('/payment/success', [PanierController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [PanierController::class, 'paymentCancel'])->name('payment.cancel');
    Route::get('Shop', [ProduitController::class, 'shop'])->name('shop.index');
    Route::resource('Panier', PanierController::class);
    



    // Manage Users
    Route::get('Users',[AdminController::class,'users'])->name('Users.index');
    Route::delete('Users/{userId}',[AdminController::class,'deletUser'])->name('Users.delete');
    Route::post('Users/{id}',[AdminController::class,'banUser'])->name('Users.ban');
});
Route::get('/', function () {
    return view('welcome');
});


?>
