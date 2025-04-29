<?php

namespace App\Http\Controllers;
use App\Helpers\CartHelper;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Produit;
use App\Models\CommandeProduit;
use App\Models\Commande;

       

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index()
{
    $panier = Auth::user()->panier;
    $count = CartHelper::count();
    
    // Get products with their pivot data
    $products = $panier->produits()->where('panier_id', $panier->id)->get();
    
    // Calculate subtotal
    $subtotal = 0;
    foreach ($products as $product) {
        $subtotal += $product->prix * $product->pivot->quantity;
    }
    
    // Calculate total 
    $total = $subtotal;
    
    return view('shop.Panier', [
        'products' => $products,
        'subtotal' => number_format($subtotal, 2, ',', ' '),
        'total' => number_format($total, 2, ',', ' ') ,
        'count'=>$count      
    ]);
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
            $product = Produit::find($request->product_id);
            
           
            if ($product->product_stock <= 0) {
                return redirect()->route('shop.index')->with('delimite', 'Stock limité');
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
                 
                    return redirect()->route('shop.index')->with('delimite', 'Stock limité');
                }
            } else {
               
               $create= $panier->produits()->syncWithoutDetaching([
                    $product->id => ['quantity' => 1]
                ]);
                if ($create) {
                   
                 
                    $product->product_stock -= 1;
                   $product->save();
                  
                   
    
                   return redirect()->route('shop.index')->with('success', 'Produit ajouté au panier');

                } else {
                    return back()->with('error', 'Échec de l\'ajout du produit au panier.');
                }
            }
        } catch (\Exception $e) {
            return back()->with('error' . $e->getMessage());
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
    
       $product = Produit::find($Panier);

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


    public function payement(Request $request)
{
   
    // Validate the request
    $validated = $request->validate([
        'total' => 'required|numeric|min:0',
        'note' => 'nullable|string'
    ]);
    
    $total = $validated['total'];
    
    // Initialize Stripe
    \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
    
    // Get cart items for the current user
    $panier=Auth::user()->panier;

    $products = $panier->Produits()->get() ;
    // dd($products);
   
    $order = Commande::create([
        'user_id' => Auth::id(),
        'total_prix' => $validated['total'],
        'status' => 'pending'
    ]);
    
    // Create line items for Stripe from cart products
    $lineItems = [];
    foreach ($products as $product) {
        CommandeProduit::create([
            'Product_id' => $product->id,
            'Commande_id' => $order->id,
            'quantity' =>$product->pivot->quantity,
            'price' => $product->product_prix,
        ]);
        $lineItems[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => $product->product_name,
                    'images' => [asset('storage/' . $product->product_image)],
                ],
                'unit_amount' => intval($product->product_prix * 100), // Convert to cents
            ],
            'quantity' => 1,
        ];
    }
    
    try {
        // Create Stripe Checkout Session
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'metadata' => [
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'note' => $request->note ?? '',
            ],
            'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);
        
        
        // Return session ID to frontend
        return response()->json([
            'success' => true,
            'url' => $session->url,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}



public function paymentSuccess(Request $request)
{
    $sessionId = $request->query('session_id');
    
    if ($sessionId) {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        
        if ($session->payment_status === 'paid') {
            $order = Commande::find($session->metadata->order_id);

            if ($order) {
                $order->status = 'completed';
                $order->save();

                $panier = Auth::user()->panier;
                $panier->Produits()->detach();

                return view('payment.success');
            }
        }
    }
    
    return redirect()->route('shop.index')->with('error', 'Le paiement a échoué');


}

public function paymentCancel()
{
    return redirect()->route('Panier.index')->with('warning', 'Paiement annulé');
}
}
