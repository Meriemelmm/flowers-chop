<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
      $users= User::paginate(20);
    
     return view('dashboard.users',['users'=>$users]);

    }
    public function deletUser(Request $request,$userId){
        $user= User::find($userId);
        if($user){
            $user->delete();
            return redirect()->route('Users.index')->with('success', 'User supprime avec succès !');   
        }

    }
    public function BanUser(Request $request,$id){
        $user= User::find($id);
       
        if($user){
            if($user->is_ban ==false){
                $user->is_ban =true;
                $user->save();

            }
            else{
                $user->is_ban = false;
                $user->save();
            }
               return redirect()->route('Users.index'); 

           
        }

    }
    public function statistique()
    {
        $actifs = User::where('role', 'client')->where('is_ban', false)->count();
        $banni = User::where([['role', 'client'], ['is_ban', true]])->count();
        $commandes = Commande::count();
        $products = Produit::count();
     
        $produitsEnStock = Produit::where('product_stock', '>', 0)->count(); 

        return view('dashboard.statistiques', compact('actifs', 'banni', 'commandes', 'products', 'produitsEnStock'));
    }
   
    
}
