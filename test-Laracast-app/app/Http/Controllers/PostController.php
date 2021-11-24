<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class PostController extends Controller
{
    //
    
    public function store_post(Request $request)
    {
        //    protected $fillable = ['title','excerpt','body','category_id'];
        Post::create([
            'title' => $request -> title,
            'excerpt' => $request -> excerpt,
            'body' => $request -> body,
            'category_id' => $request -> category_id,
           
        ]);

        return redirect('/');  
        
    }
      
   public function index() 
   {
    

        $categories = Category::latest();
        $posts = Post::all();        
        if(request('search')){
            $categories ->where('name','like','%' . request('search') . '%');}
        return view('welcome',['categories' => $categories->paginate(3),'posts' => $posts]);
    }

   public function postsByAuthors(User $author) 
   {
    return view('postsByAuthors',['posts' => $author->posts]);
   } 

}