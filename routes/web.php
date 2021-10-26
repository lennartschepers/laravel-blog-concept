<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
//first use of a controller, copy pasted the code that was originally here to clean up
// not specifying :slug will automatically grab the id column instead
Route::get('posts/{post:slug}', [PostController::class, 'show']);
//comments post request
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//this code was no longer useful, since I extracted the logic in the postcontroller and in the model in the query filter
/* Route::get('categories/{category:slug}', function (Category $category) { */
/*   return view( */
/*     'posts', */
/*     [ */
/*       'posts' => $category->posts, */
/*       'categories' => Category::all(), */
/*       'currentCategory' => $category */
/*     ] */
/*   ); */
/* })->name('category'); */

// middleware to make the route only accessible to guests (default middlware made available by laravel), aka users who are not logged in
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');


//admin
// using can middleware to avoid duplication, since we defined a gate in our appservice provider we can use that like this as middleware too

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
Route::post('admin/posts/', [AdminPostController::class, 'store'])->middleware('can: admin');
