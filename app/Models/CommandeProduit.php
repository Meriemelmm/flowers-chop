<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    protected $table='commande_produits';
    protected $fillable=['Commande_id','Product_id','quantity','price'];
}
