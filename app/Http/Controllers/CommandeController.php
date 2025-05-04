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
    
      
        if (!$commande) {
            return redirect()->route('shop.index')->with('error', 'Aucune commande trouvée.');
        }
    
      
        $commandes = CommandeProduit::where('commande_id', $commande->id)->get();
    
       
        return view('shop.Commande', compact('commandes'));
    }
    
     public function allCommandes(){
 $commandes=Commande::paginate(10);
 return view('dashboard.Commande',['commandes'=>$commandes]);



     }
     public function cancel($id)
     {
         $commande = Commande::find($id);
     
         if (!$commande) {
             return redirect()->back()->with('error', 'Commande introuvable.');
         }
     
         if ($commande->status === 'pending') {
             $commande->status = 'cancelled';
             $commande->save();
             return redirect()->back()->with('success', 'Commande annulée avec succès.');
         }
     
         return redirect()->back()->with('warning', 'Cette commande ne peut pas être annulée.');
     }
     

}
