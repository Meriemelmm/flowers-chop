<?php

namespace App\Http\Controllers;

use App\Models\TypeFleur;
use Illuminate\Http\Request;

class TypeFleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $Types=TypeFleur::all();
         if($Types){
            return view('dashboard.TypeFleur',['types'=>$Types]);  
         }
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_name' => ['required', 'string', 'regex:/^[A-Za-zÀ-ÿ\s]+$/', 'max:255'],
        ]);
        
        $type= TypeFleur::create(['type_name'=>$validated['type_name']]);
        if($type){

            return redirect()->route('TypeFleur.index')->with('success', 'type fleur  cree avec succès !');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeFleur $typeFleur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeFleur $typeFleur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeFleur $TypeFleur)
    {
        if($TypeFleur){
             $validated = $request->validate([
            'type_name' => ['required', 'string'],
        ]);
        
        $TypeFleur->type_name=$validated['type_name'];
        $update=$TypeFleur->save();
        if($update){

            return redirect()->route('TypeFleur.index')->with('success', 'type fleur  modifié avec succès !');

        }
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeFleur $TypeFleur)
    {
        
        if($TypeFleur){
              $TypeFleur->delete();
         return redirect()->route('TypeFleur.index')->with('success', 'type fleur  supprimé avec succès !');
      
        }
      
    }
}
