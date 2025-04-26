<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    
    protected $table='commandes';
    protected $fillable=['user_id','status','total_prix'];
    public function  client(){
        return $this->belongsTo(User::class);
    }
    public function livraison(){
        return $this->hasOne(livraison::class);
    }
    public function products(){
     return $this ->belongsToMany(Produits::class,'produit_commande','CommandeID','ProductID')->withpivot('quantity');
    }
}
