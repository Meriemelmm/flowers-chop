<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    
protected $table='produits';
    protected $fillable=['type_id','occassion',
    'product_image','product_stock','product_name','product_description','product_prix'];
    public function types(){
        return $this->belongsTo(TypeFleur::class);
    }
}
