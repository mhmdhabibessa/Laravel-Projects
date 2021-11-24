<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

    public function create() {

        return view('Login');
    }


    public function store() {

        $attributes = request() -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth() -> attempt($attributes)){
            return redirect('/') ->with('success','You Are Login');
        }

        return back() 
        -> withInput()
        -> withErrors(['email' => 'your email is not exists']);
    }
    
    public function destroy() {
        auth() -> logout();
        
        return redirect('/') ->with('success','GoodBay ');
    }
   
}

