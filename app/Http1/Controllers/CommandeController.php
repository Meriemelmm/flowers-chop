<?php

namespace App\Http\Controllers;
use App\Models\Panier;
use  App\Models\CommandeProduit;
use  App\Models\Commande;


use Illuminate\Http\Request;

class CommandeController extends Controller
{

    public function ajoute_Commande(Panier $panier){
        

        $products=$panier->produits()->get();
        

        
    }
    
}
