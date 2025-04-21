<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeFleur extends Model
{
    use HasFactory;
    protected $table='types';
    protected $fillable = ['type_name']; 
    public function produits(){
        return $this->belongsToMany(produit::class,'produit_type', 'produit_id', 'type_id');
    }
}

