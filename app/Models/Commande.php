<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Produit;

class Commande extends Model
{
    
    protected $table='commandes';
    protected $fillable=['user_id','status','total_prix'];
    public function  client(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function livraison(){
        return $this->hasOne(livraison::class);
    }
    public function products(){
        return $this->belongsToMany(Produit::class, 'commande_produits', 'Commande_id', 'Product_id')->withPivot('quantity','price');
    }
    
}
