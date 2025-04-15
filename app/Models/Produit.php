<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    
protected $table='produits';
    protected $fillable=['category_id',
    'product_image','product_stock','product_name','product_description','product_prix'];
    public function types()
{
    return $this->belongsToMany(TypeFleur::class, 'produit_type', 'produit_id', 'type_id');
}

    public function Category(){
        return $this->belongTo(Category::class);
    }
    public function images(){
        return $this->hasMany(ImageProduct::class);
    }
}
