<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
class CommentController extends Controller
{
    //

    public function storecomment(Post $posts) {

        
        // request() -> validate([
        //     'body' => 'required'
        // ]);

        $posts ->comment() -> create([
            'user_id' => request() -> user() -> id,
            'body'   => request('body')  
        ]);
        

    }
}
