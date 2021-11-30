<?php
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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




  Route::get('/', [PostController::class,'home']);
  Route::get('post/{post}', [PostController::class,'post_id']);

//category
  Route::get('categories/{category:name}',[CategoryController::class, 'Showcategory']);
  Route::get('authors/{author:username}',[CategoryController::class, 'ShowAuhtor']);

//login and register 
  Route::get('register',[RegisterController::class,'create'])->middleware('guest');
  Route::post('register',[RegisterController::class,'store'])->middleware('guest');
  Route::get('login',[SessionController::class,'login'])->middleware('guest');
  Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');
  Route::post('login',[SessionController::class,'loginStore'])->middleware('guest');
// write_commnet 
  Route::post('post/{post}/comments', [CommentController::class,'storeComment']);

  //admin 

  Route::get('admin/post/create', [AdminController::class,'create'])->middleware('admin');
  Route::post('admin/posts', [AdminController::class,'store'])->middleware('admin');
  Route::get('admin/posts', [AdminController::class,'showAllPost'])->middleware('admin');
  Route::get('admin/posts/{post}/edit', [AdminController::class,'edit'])->middleware('admin');
  Route::patch('admin/posts/{post}/edit', [AdminController::class,'update'])->middleware('admin');
  Route::delete('admin/posts/{post}', [AdminController::class,'destroy'])->middleware('admin');
  
  