<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\TypeFleur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validate;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types=TypeFleur::all();

         return view('addProduct',['types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { dd($request->file('product_image'));
     
        $validated=  $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description'=>'required|string|max:255',
            'product_stock'=>'required|integer|min:0',
            'product_prix'=>'required|numeric|min:0',
            'product_image'=>'required|string',
            'type_id'=>'required',
            
         
        ]);

      
        $product= Produit::create(['product_name'=>$request->product_name,
        'product_description'=>$request->product_description,
        'product_stock'=>$request->product_stock,
        'product_prix'=>$request ->product_prix,
        'product_image'=>$request->product_image,
        'type_id'=>$request->type_id,'occassion'=>$request->occassion
    ]);
   
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        //
    }
}
