<?php

namespace App\Http\Controllers;


class SessionController extends Controller
{
    //


    public function login(){

        return view('login.create');
    }
    public function loginStore() {

        $attributes = request() ->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
       if(auth() -> attempt($attributes)) {

        return redirect('/')->with('success','Welcome again');

       }

       return back() -> withErrors(['email' => ' Your provided credentails could not be verfied ']);




    }

    
    public function destroy() {

        auth() -> logout();
        return redirect('/')->with('success','GodBaaaay  !') ;

    }



    
}
