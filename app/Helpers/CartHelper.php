<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class CartHelper
{
    public static function count()
    {
        try {
            if (!Auth::check()) {
                return 0;
            }

            $user = Auth::user();

          
            if ($user->role !== 'client') {
                return 0;
            }

            if (!$user->panier) {
                return 0;
            }

            return $user->panier->produits()->count();
        } catch (\Throwable $e) {
            return 0;
        }
    }
}
