<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('Shop');
        
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
        $user= Auth::user();
        $panier=Panier::create(['user_id'=>$user->id]);
        
        dd($user->id);
       
        $request->validate([
            'product_id' => 'required|exists:produits,id',
        ]);
        $panierid=$user->panier->id;
        dd( $panierid);
        
    
 
        
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
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
