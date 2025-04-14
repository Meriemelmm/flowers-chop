<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table='image_products';
    protected $fillable=['product_id','image'];
    public function produitg (){
        return $this->belongsTo(Produit::class);
    }
    
}
