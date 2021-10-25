<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostCommentsController extends Controller
{
  // add comment to the given post 
  public function store(Post $post)
  {
    // validation
    request()->validate([
      'body' => 'required'
    ]);


    $post->comments()->create([
      'user_id' => request()->user()->id,
      'body' => request('body')
    ]);

    //redirect
    return back();
  }
}
