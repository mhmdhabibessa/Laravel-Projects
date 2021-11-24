<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PostController::class,'index'])->name('welcom');
Route::get('/categories/{category:name}', [CategoryController::class,'ShowCategory'])->name('category.show');
Route::get('/authors/{author}', [PostController::class,'postsByAuthors'])->name('postsByAuthors.show');
Route::post('/store_category', [CategoryController::class, 'store_category'])->name('store');
Route::get('/category/{id}');
Route::post('posts/{post::id}/comment', [CommentController::class, 'storecomment']);
Route::get('/Show_register', [RegisterController::class, 'create']) -> middleware('guest');
Route::post('/store_register', [RegisterController::class, 'store']) -> middleware('guest');
Route::post('/Logout', [SessionController::class,'destroy']) -> middleware('auth');
Route::get('/Login',[SessionController::class,'create']) ->middleware('guest');
Route::post('/SessionLogin',[SessionController::class,'store']) ->middleware('guest');



Route::get('/test2',function(){
    $categories = Category::latest();
    $posts = Post::all();    
    return view('test2',['categories' => $categories->get(),'posts' => $posts]);
  });

  Route::get('/create_category',function(){
    return view('create_category');
  });
  
  Route::get('/create_post',function(){
      $category = Category::all();
      return view('create_post',['category' => $category]);
    });

  
