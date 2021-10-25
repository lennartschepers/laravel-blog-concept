<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
  public function index()
  {

    return view('posts.index', [
      // paginate(x) instead of get() will change the posts array to a paginated array, where we can then add posts->links in a view to add the paginater in the frontend. withQueryString ensures that all current query string values are added so we can also change pages within a category
      'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
    ]);
  }
  public function show(Post $post)
  {
    return view('posts.show', [
      'post' => $post
    ]);
  }
  public function create()
  {
    /* if (auth()->guest()) { */
    /*   abort(403); */
    /* } */

    return view('posts.create');
  }
  public function store()
  {
    //validate the request
    $attributes = request()->validate([
      'title' => 'required',
      'thumbnail' => 'required|image',
      'slug' => ['required', Rule::unique('posts', 'slug')],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')],
    ]);
    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    Post::create($attributes);
    return redirect('/');
  }
}
