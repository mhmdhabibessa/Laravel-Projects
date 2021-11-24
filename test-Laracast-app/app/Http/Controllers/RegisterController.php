<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function create() {

        return view('register');
    }

    public function store(Request $request){

        // User::create([
        //     'name' => $request -> name,
        //     'username' => $request -> username,
        //     'email' => $request -> email,
        //     'password' => $request -> password,
           
        // ]);

       $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
            
           
        ]);

        User::create($attributes);
        // session() -> flash('success','Your acount has been created');
        return redirect('/') -> with('success','Your acount has been created');


    }

}
