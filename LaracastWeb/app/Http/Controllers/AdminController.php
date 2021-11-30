<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    //

    
    public function create() {
        return view('admin.posts.create', ['posts' => Post::all()
        
    ]); 

    }
    public function showAllPost() {
        return view('admin.posts.index' ,[
              'posts' => Post::all()  

        ]);

    }

    public function store() {
            
        
        $attributes = request() -> validate([

               'title' => 'required|min:4',
               'body' => 'required',
               'excerpt' => 'required',
               'thumbnail' => 'required|image',
               'category_id' => ['required',Rule::exists('categories', 'id' )]

           ]);
           $attributes['user_id'] = auth() -> id();
           $attributes['thumbnail'] = request() -> file('thumbnail') -> store('thumbnail') ;

           Post::create($attributes);

           return redirect('/');
   }

   public function edit(Post $post) {


       return view('admin.posts.edit',[   
        'posts' => $post 
        
       ]);
   }

   public function update(Post $post) {
    $attributes = request() -> validate([

        'title' => 'required|min:4',
        'body' => 'required',
        'excerpt' => 'required',
        'thumbnail' => 'required|image',
        'category_id' => ['required',Rule::exists('categories', 'id' )]

    ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request() -> file('thumbnail') -> store('thumbnail');
        } 

    $post -> update($attributes);

        return back() ->with('success' ,'Post Update') ;
   }

   public function destroy(Post $post) {

        $post -> delete();

        return back() -> with('success' , 'Post will Delete');

}

    
}
