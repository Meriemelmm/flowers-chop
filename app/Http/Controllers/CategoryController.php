<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validate;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$categories=Category::all();
        return view('Categories',['categories'=>$categories]);
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
            'category_name' => ['required', 'string', 'regex:/^[A-Za-zÀ-ÿ\s]+$/', 'max:255'],
        ]);
        
        $category= Category::create(['category_name'=>$validated['category_name']]);
        if($category){

            return redirect()->route('categories.index')->with('success', 'Produit cree avec succès !');

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
    public function edit($category)
    {
        $categoryId= Category::find($category);
        return view('categories',['CategoryId'=>$categoryId]);
        
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
    public function destroy( $category)
    {
        $category= Category::find($category);
        $category->delete();
         return redirect()->route('categories.index')->with('success', 'Produit cree avec succès !');
    }
}
