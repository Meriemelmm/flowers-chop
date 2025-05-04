<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeFleurController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommandeController;

use App\Http\Controllers\Commande;
use App\Helpers\CartHelper;

use App\Http\Middleware\CheckRole;

Route::middleware(['auth', CheckRole::class.':admin'])->group(function () {
   

    Route::resource('categories', CategoryController::class);
    Route::resource('TypeFleur', TypeFleurController::class);
    Route::resource('Product', ProduitController::class);

    
    Route::get('Users', [AdminController::class, 'users'])->name('Users.index');
    Route::delete('Users/{userId}', [AdminController::class, 'deletUser'])->name('Users.delete');
    Route::post('Users/{id}', [AdminController::class, 'banUser'])->name('Users.ban');
    Route::get('bord', [AdminController::class, 'statistique'])->name('static');

   
    Route::get('/commandes', [CommandeController::class, 'allCommandes'])->name('commande.total');
       
    Route::put('/commandes/{id}', [CommandeController::class, 'cancel'])->name('commande.cancel');


});
Route::middleware(['auth', CheckRole::class.':client'])->group(function () {
    
    Route::get('Shop', [ProduitController::class, 'shop'])->name('shop.index');

    Route::resource('Panier', PanierController::class);
    Route::post('/payement', [PanierController::class, 'payement'])->name('payement');
    Route::get('/payment/success', [PanierController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel', [PanierController::class, 'paymentCancel'])->name('payment.cancel');
  
    Route::get('/Commandes', [CommandeController::class, 'getCommande'])->name('commande.user');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    
});
Route::get('/', [ProduitController::class, 'getProduct'])->name('home');
Route::get('register', [UserController::class, 'showRegister'])->name('register');
Route::post('register', [UserController::class, 'register'])->name('register.store');
Route::get('login', [UserController::class, 'showLogin'])->name('login.show');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('Shop', [ProduitController::class, 'shop'])->name('shop.index');
Route::get('/detail/{produit}', [ProduitController::class, 'afiche'])->name('produit.afiche');



?>
