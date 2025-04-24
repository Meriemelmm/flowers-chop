<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$panier= Auth::user()->panier;

$products=$panier->produits()->where('panier_id',$panier->id)->get();

  if($products){
   
      return view('Panier',['products'=>$products]);
  }
   

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour ajouter au panier.');
    }

    $user = Auth::user();
    
    $panier = $user->panier ?? Panier::create(['user_id' => $user->id]);

    $request->validate([
        'product_id' => 'required|exists:produits,id',
    ]);

    try {
        
        $existingProduct = $panier->produits()->where('product_id', $request->product_id)->first();

        if ($existingProduct) {
           
            $updated = $panier->produits()->updateExistingPivot($existingProduct->pivot->product_id, [
                'quantity' => $existingProduct->pivot->quantity + 1
            ]);

          
            if ($updated) {
               
                return redirect()->route('Shop')->with('success', 'Produit ajouté au panier');
            } else {
                return back()->with('error', 'Échec de la mise à jour de la quantité.');
            }
        } else {
          
            $create = $panier->produits()->attach($request->product_id, ['quantity' => 1]);

          
            if ($create) {
                return redirect()->route('Shop')->with('success', 'Produit ajouté au panier');
            } else {
                return back()->with('error', 'Échec de l\'ajout du produit au panier.');
            }
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Erreur technique: ' . $e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Panier)
    {
        $validated = $request->validate([
            'quantity' => 'integer|min:1',
        ]);
    
        $panier = Auth::user()->panier()->first();
    
        $existProduct = $panier->produits()->where('product_id', $Panier)->first();
        if ($existProduct) {
            $updated = $panier->produits()->updateExistingPivot($Panier, [
                'quantity' => $request->quantity
            ]);
    
            if ($updated) { 
                return response()->json(['message' => "quantity updated successful"], 200);
            }
        }
    
        return response()->json(['message' => 'product not found in cart'], 404);
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$Panier)
    {
        $panier= Auth::user()->panier;
       

       $product=$panier->produits()->where('product_id',$Panier)->first();
       if($product){
        $panier->produits()->detach($Panier);
        return redirect()->route('Panier.index')->with('success', 'Produit supprime avec succès !');   
     }

    }
}
