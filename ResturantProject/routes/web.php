<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// go to menu page 

// Route::get('view_menu', function () {
//     return view('menu');
// });
// // go to contact_us page 
// Route::get('contact_us', function() {
//     return view('contact_us');
// });
// // go to contact_us page 
// Route::get('view_about_us', function() {
//     return view('about_us');
// });

// // go to contact_us page 
// Route::get('FormaddProduct', function() {
//     return view('FormaddProduct');
// });







Auth::routes();



Route::post('/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('store');
Route::get('/FormaddProduct', [App\Http\Controllers\Frontendcontroller::class, 'FormaddProduct'])->name('FormaddProduct');


Route::get('/contact_us', [App\Http\Controllers\Frontendcontroller::class, 'contact_us'])->name('contact_us');

Route::get('/menu', [App\Http\Controllers\ProductsController::class, 'index'])->name('index');

Route::get('/about_us', [App\Http\Controllers\Frontendcontroller::class, 'view_about_us'])->name('about_us');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

