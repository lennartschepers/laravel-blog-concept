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
}
