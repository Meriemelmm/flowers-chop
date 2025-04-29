<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Panier;

use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Validate;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Auth\Events\Validated;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;



class UserController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->back()->withFallback('/Shop');
        }
        return view('Auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $isFirstUser = User::count() === 0;
    
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users|email|lowercase',
            'password' => 'required|string|min:8|confirmed',
        ];
    
        if (!$isFirstUser) {
            $rules['phone'] = 'required|string|max:20';
            $rules['country'] = 'required|string|max:255';
            $rules['address'] = 'required|string|max:255';
            $rules['city'] = 'required|string|max:255';
            $rules['postal_code'] = 'required|string|max:10';
        } else {
            $rules['phone'] = 'nullable|string|max:20';
            $rules['country'] = 'nullable|string|max:255';
            $rules['address'] = 'nullable|string|max:255';
            $rules['city'] = 'nullable|string|max:255';
            $rules['postal_code'] = 'nullable|string|max:10';
        }
    
        // Validation
        $validated = $request->validate($rules);
    
        // Création de l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'phone' => $validated['phone'] ,
            'country' => $validated['country'] ,
            'address' => $validated['address'] ,
            'city' => $validated['city'] ,
            'postal_code' => $validated['postal_code'] ,
            'role' => $isFirstUser ? 'admin' : 'client',
        ]);
    
        if ($user) {
            Auth::login($user);
    
            if ($user->role === "client") {
                Panier::create([
                    'user_id' => $user->id
                ]);
    
                return redirect('/');

            }
    
            return redirect('/Product'); 
        }
    
        return "Erreur lors de l'enregistrement.";
    }
    








    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->back()->withFallback('/Shop');
        }
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|lowercase',
            'password' => 'required|string'
        ]);
    
        if (Auth::attempt($validated)) {
            $user = Auth::user(); // Get the logged-in user
    
            if ($user->role === 'admin') {
                return redirect('/Product'); 
            } else {
                return redirect('/Shop'); // Redirect others (clients) to home
            }
    
        } else {
            return "Login failed!";
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect('/login'); 
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
