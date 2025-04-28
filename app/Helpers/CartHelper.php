<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class CartHelper
{
    /**
     * Compter les produits dans le panier de l'utilisateur.
     *
     * @return int
     */
    public static function count()
    {
        $count = 0;
        
        if (Auth::check()) {
            $panier = Auth::user()->panier;
            if ($panier) {
                $count = $panier->produits()->count();
            }
        }
        
        return $count;
    }
}
