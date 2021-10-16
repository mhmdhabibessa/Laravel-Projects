<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Frontendcontroller extends Controller
{
    //

    public function view_menu() {

        return view('Frontend.menu');
    }

    public function contact_us() {
        return view('Frontend.contact_us');
    }
    public function view_about_us(){
        return view('Frontend.about_us');
    }
    
    public function FormaddProduct(){
        return view('Frontend.FormaddProduct');
    }

    
//     public  function add(Request $requset){
//         $products = new Products();
//         $products -> name  = $requset -> input('name'); 
//         $products -> price  = $requset -> input('price');
//         $products -> image  = $requset -> input('image');
//         $products -> description  = $requset -> input('description');
//         $products -> save();

//         return redirect('/home');

// }

// show 

// public  function show($id){
//     $products = Products::find($id);
//     return view(['products' => $products,'layout'=> 'create']);
    

//     return redirect('home');

// }
}
                        


    
  
    




