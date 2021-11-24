<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function store_category(Request $request)
    {
        //
        Category::create([
            'name' => $request -> name,
            'link_photo' => $request -> link_photo,
           
        ]);

        return redirect('/')->with('success','Your Are Create Category New');
    }

   public function ShowCategory (Category $category) 
   {
    if(request('search')){
        $posts ->where('title','like', '%' . request('search') . '%');   
    }
        return view('post',['posts' => $category->posts]);
   } 
}
