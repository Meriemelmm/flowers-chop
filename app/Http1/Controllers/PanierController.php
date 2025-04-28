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
$totalprix=$this->totalProduct($products);


  if($products){
   
    $totalprix=$this->totalProduct($products);
   
      return view('Panier',['products'=>$products,'total'=>$totalprix]);
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
     * 
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
        $product = Produit::find($request->product_id);
        
       
        if ($product->product_stock <= 0) {
            return redirect()->route('Shop')->with('delimite', 'Stock limité');
        }

        $existingProduct = $panier->produits()->where('product_id', $request->product_id)->first();

        if ($existingProduct) {
         
            $quantity = $existingProduct->pivot->quantity + 1;
            
          
            if ($product->product_stock > 0) {
                $updated = $panier->produits()->updateExistingPivot($existingProduct->pivot->product_id, [
                    'quantity' => $quantity
                ]);

                if ($updated) {
                   
                
                    $product->product_stock -= 1;
                    $product->save();
                   
                 
                    return back()->with('success', 'Produit ajouté au panier');
                } else {
                    return back()->with('error', 'Échec de la mise à jour de la quantité.');
                }
            } else {
             
                return redirect()->route('Shop')->with('delimite', 'Stock limité');
            }
        } else {
           
           $create= $panier->produits()->syncWithoutDetaching([
                $product->id => ['quantity' => 1]
            ]);
            if ($create) {
               
             
                $product->product_stock -= 1;
               $product->save();
              
               

                return redirect()->route('Shop')->with('success', 'Produit ajouté au panier');
            } else {
                return back()->with('error', 'Échec de l\'ajout du produit au panier.');
            }
        }
    } catch (\Exception $e) {
        return back()->with('error' . $e->getMessage());
    }
}


public function totalProduct($produits){
    $sum=0;
  foreach($produits as $produit){
    $sum+=$produit->pivot->quantity * $produit->product_prix;
  }
  return $sum;
    
 
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
    
    public function updated($id, Request $request)
    {
        // Récupérer le panier de l'utilisateur authentifié
        $user = Auth::user();

        // Récupérer l'article du panier pour l'utilisateur et le produit spécifié
        $cartItem = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Produit non trouvé dans le panier'], 404);
        }

        // Validation de la quantité (doit être un entier et supérieur ou égal à 1)
        $quantity = $request->input('quantity');
        if (!is_numeric($quantity) || $quantity < 1) {
            return response()->json(['message' => 'Quantité invalide'], 400);
        }

        // Vérifier que la quantité demandée ne dépasse pas le stock disponible
        $product = Product::find($productId);
        if ($quantity > $product->product_stock) {
            return response()->json(['message' => 'Quantité supérieure au stock disponible'], 400);
        }

        // Mettre à jour la quantité de l'article dans le panier
        $cartItem->quantity = $quantity;
        $cartItem->save();

        // Calculer le nouveau total de l'article
        $totalPrice = $quantity * $product->price;

        // Mettre à jour le total global du panier
        $cartItems = Cart::where('user_id', $user->id)->get();
        $cartSubtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Retourner la réponse avec les nouveaux totaux
        return response()->json([
            'message' => 'Quantité mise à jour avec succès',
            'new_quantity' => $quantity,
            'new_total' => number_format($totalPrice, 2),
            'cart_subtotal' => number_format($cartSubtotal, 2)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Panier)
    {
        $validated = $request->validate([
            'quantity' => 'integer|min:1',
        ]);
    
        $product=Produit::find($request->Panier);
       if($product->product_stock<=0){
        return redirect()->route('Shop')->with('delimite', 'Stock limité');
       }
        $panier = Auth::user()->panier()->first();
    
        $existProduct = $panier->produits()->where('product_id', $Panier)->first();
      
        
        if ($existProduct) {
        
            $updated = $panier->produits()->updateExistingPivot($Panier, [
                'quantity' => $request->quantity
            ]);
    
            if ($updated) { 
                if($request->action==='increment'){
                    $product->product_stock-=1;
                    $product->save();
                    dd($product->save());   
                }
                if($request->action==='decrement'){
                    $product->product_stock+=1;
                    $product->save();
                    
                }

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
        $quantity=$product->pivot->quantity;
        $product->product_stock+=$quantity;
        $product->save();
       
    
        $panier->produits()->detach($Panier);
      
        return redirect()->route('Panier.index')->with('success', 'Produit supprime avec succès !');   
     }

    }
}
