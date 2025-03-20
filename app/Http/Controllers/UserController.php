<?php

namespace App\Http\Controllers;



use App\Models\User;
 
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
        return view('register');
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
    
        
        $validated=  $request->validate([
            'name' => 'required|string|max:255',
            'email'=>'required|unique:users|email|lowercase',
            'password'=>'required|string|min:8|confirmed
            '
        ]);
    
       $user= User::create(['name'=>$validated['name'],
       'email'=>$validated['email'],
       'password'=>$validated['password']]); 
       if($user){
        return " correct";

    }
    else{
        return "incorrct";
    }
    }




    public function showLogin(){
        return view('login');
    }
    public function login(Request $request ){

        $validated=  $request->validate([
          'email' =>'required|email|lowercase','password'=>'required|string'
        ]);
        if (Auth::attempt($validated)) {
          

           return redirect()->route('register');

        }
        else{
            return "hhh";
        }
 
    
    
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
