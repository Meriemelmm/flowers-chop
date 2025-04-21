<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $table = 'paniers';

    protected $fillable = [
        'user_id',
      
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Produit(){
        return $this->belongsToMany(Produit::class,'produit_panier','produit_id','panier_id');
    }
}
