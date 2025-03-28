<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\TypeFleur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validate;
 use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produit::all();
        
         return view('gestionProduct',['products'=>$products]);
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
    {
     
        $validated=  $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description'=>'required|string|max:255',
            'product_stock'=>'required|integer|min:0',
            'product_prix'=>'required|numeric|min:0',
            'product_image'=>'required|image|mimes:png,jpg,jpeg,svg',
            'type_id'=>'required',
            
         
        ]);
       $filename= $request->file('product_image')->store('ProductImge','public');

      
        $product= Produit::create(['product_name'=>$request->product_name,
        'product_description'=>$request->product_description,
        'product_stock'=>$request->product_stock,
        'product_prix'=>$request ->product_prix,
        'product_image'=>$filename,
        'type_id'=>$request->type_id,'occassion'=>$request->occassion
    ]);
    if($product){
        return redirect()->route('index.gestion')->with('success', 'Produit cree avec succès !');
    }
    else{
        return "errors" ;
    }
   
        
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
        $types=TypeFleur::all();
      return view ('addProduct',['product'=>$produit,'types'=>$types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        
        $validated=  $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description'=>'required|string|max:255',
            'product_stock'=>'required|integer|min:0',
            'product_prix'=>'required|numeric|min:0',
            'product_image'=>'required|image|mimes:png,jpg,jpeg,svg',
            'type_id'=>'required',
            
         
        ]);
        dd($request->all());
       $filename= $request->file('product_image')->store('ProductImge','public');

      
        $product= Produit::update(['product_name'=>$request->product_name,
        'product_description'=>$request->product_description,
        'product_stock'=>$request->product_stock,
        'product_prix'=>$request ->product_prix,
        'product_image'=>$filename,
        'type_id'=>$request->type_id,'occassion'=>$request->occassion
    ]);
    if($product){
        return redirect()->route('index.gestion')->with('success', 'Produit cree avec succès !');
    }
    else{
        return "errors" ;
    }
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Produit $produit)
    {
     
      if($produit){
        $produit->delete();
        return redirect()->route('index.gestion')->with('success', 'Produit supprime avec succès !');
  }
  else{
      return " nexiste pas";
  }
       
        
    }
}
