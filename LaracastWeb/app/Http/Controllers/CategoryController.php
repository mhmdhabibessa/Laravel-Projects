<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class CategoryController extends Controller
{
    //

    public function  ShowAuhtor(User $author){

            return view('posts', [
                'posts'  => $author ->posts,
                'categories' =>  Category::all()   ]);
                
            }
        

    public function Showcategory(Category $category) {
        return view('posts', [
            'posts'  => $category ->posts ,
            'categories' =>  Category::all()  
      ]);
    }        
        
}
