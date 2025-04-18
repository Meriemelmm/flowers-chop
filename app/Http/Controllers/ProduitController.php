<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\TypeFleur;
use App\Models\Category;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validate;
 use Illuminate\Database\Eloquent\Relations\BelongsTo;
 use Illuminate\Support\Facades\Storage;


class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $types= TypeFleur::all();
        $categories=Category::all();
        $products = Produit::paginate(1);
        
         return view('Product',['products'=>$products,'types'=>$types,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $types=TypeFleur::all();

        //  return view('addProduct',['types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_description' => 'required|string|max:255',
        'product_stock' => 'required|integer|min:0',
        'product_prix' => 'required|numeric|min:0',
        'product_image' => 'required||image|mimes:png,jpg,jpeg,svg',
        'type_ids' => 'required|array',
        'type_ids.*' => 'exists:types,id',
        'images' => 'required|array',
        'images.*' => 'required|image|mimes:png,jpg,jpeg,svg',
        'category_id' => 'required|exists:categories,id',
    ]);
   


    $filename = $request->file('product_image')->store('ProductImage', 'public');

    $product = Produit::create([
        'product_name' => $request->product_name,
        'product_description' => $request->product_description,
        'product_stock' => $request->product_stock,
        'product_prix' => $request->product_prix,
        'product_image' => $filename,
        'category_id' => $request->category_id
    ]);
    

    if ($product) {
        $product->types()->attach($request->type_ids);

        foreach ($request->images as $image) {
            $fileImage = $image->store('images', 'public');
            ImageProduct::create([
                'product_id' => $product->id,
                'image' => $fileImage
            ]);
        }

        return redirect()->route('Product.index')->with('success', 'Produit supprime avec succès !');
    } else {
        return "errors";
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
    public function edit(Produit $Product)
    {
        $types = TypeFleur::all();
        $categories = Category::all();
        // dd($Product);
        return view('Update', ['product' => $Product, 'types' => $types, 'categories' => $categories]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Produit)
{
    $product = Produit::find($Produit);

    if ($product) {
      
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
            'product_stock' => 'required|integer|min:0',
            'product_prix' => 'required|numeric|min:0',
            'product_image' => 'image|mimes:png,jpg,jpeg,svg',
            'types' => 'required|array',
            'types.*' => 'exists:types,id',
            'images' => 'array',
            'images.*' => 'image|mimes:png,jpg,jpeg,svg',
            'category_id' => 'exists:categories,id',
        ]);

        //  cover de produit :
        if ($request->hasFile('product_image')) {
           
            $coverImage = $product->product_image;
            if ($coverImage ) {
                Storage::disk('public')->delete($coverImage);
            }

           
            $filename = $request->file('product_image')->store('ProductImage', 'public');
            $product->product_image = $filename;
        }

       // Anciennes images
        if ($request->hasFile('images')) {
            
            $images = ImageProduct::where('product_id', $Produit)->get();

            foreach ($images as $image) {
                
                Storage::disk('public')->delete($image->image);
              
                $image->delete();
            }

         
            $files = $request->file('images');
            foreach ($files as $file) {
                $fileImage = $file->store('images', 'public');
                ImageProduct::create([
                    'product_id' => $product->id,
                    'image' => $fileImage,
                ]);
            }
        }

        if (count($request->types) > 0) {
            $types_id = $request->types;
            $product->types()->sync($types_id);
        }

       
        $product->product_name = $validated['product_name'];
        $product->product_prix = $validated['product_prix'];
        $product->product_stock = $validated['product_stock'];
        $product->product_description = $validated['product_description'];
        $product->category_id = $validated['category_id'];

        
        $updated = $product->save();

     
        if ($updated) {
            return "updated ";
        } else {
            return "update ykué";
        }
    } else {
        return "Produit non trouvé";
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Produit $Product)
    {
     
      if($Product){
        $Product->delete();
        return redirect()->route('Product.index')->with('success', 'Produit supprime avec succès !');
  }
  else{
      return " nexiste pas";
  }
       
        
    }
}
