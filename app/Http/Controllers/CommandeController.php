<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Helpers\CartHelper;
use App\Models\Commande;

class CommandeController extends Controller
{
    
    public function getCommande(){
        $commande = Commande::where('user_id', Auth::user()->id)->first();
        $commandes=CommandeProduit::where('commande_id',$commande->id)->get();
        return view('shop.Commande',compact('commandes'));
        


     }
     public function allCommandes(){
 $commandes=Commande::paginate(10);
 return view('dashboard.Commande',['commandes'=>$commandes]);



     }
}
