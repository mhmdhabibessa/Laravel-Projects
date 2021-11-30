<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class PostController extends Controller
{

    //

    public function post_id(Post $post) {

        return view('posting', ['post'  => $post ]);

    }

    public function home() {

      // $this -> authorize('admin');

      $posts = Post::latest();
    if(request('search')){
              $posts  
              ->where('title','like', '%' . request('search') . '%') 
              ->orWhere('body','like', '%' . request('search') . '%'); 
  }
          
    return view('posts',[
      'posts'  => $posts->get(),
      'categories' => Category::all()                    
      ]);

    }


   




}
