<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
  public function index()
  {
    return view('admin.posts.index', [
      'posts' => Post::paginate(50)
    ]);
  }

  public function create()
  {
    /* if (auth()->guest()) { */
    /*   abort(403); */
    /* } */

    return view('admin.posts.create');
  }
  public function store()
  {
    //validate the request
    $attributes = $this->validatePost();
    $attributes['user_id'] = auth()->id();
    $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    Post::create($attributes);
    return redirect('/');
  }

  public function edit(Post $post)
  {
    return view('admin.posts.edit', [
      'post' => $post
    ]);
  }

  public function update(Post $post)
  {
    //validate the request
    $attributes = $this->validatePost($post);
    // php8 solution
    if ($attributes['thumbnail'] ?? false) {
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }
    $post->update($attributes);

    return back()->with('success', 'Post Updated');
  }
  public function destroy(Post $post)
  {
    $post->delete();
    return back()->with('success', 'Post Deleted');
  }

  // argument set to null if nothing is passed. protected since only other functions in this class or maybe children need to access it
  protected function validatePost(?Post $post = null): array
  {
    // if $post is null, it is set to new Post()
    $post ??= new Post();
    return request()->validate([
      'title' => 'required',
      // if updating a post ($post already exists in db) then a thumbnail is not required
      'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
      //slug still has to be unique in case of update but ignore current post, in case of creating (store) new post, $post-> will not exist yet and thus will ignore null
      'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
      'excerpt' => 'required',
      'body' => 'required',
      'category_id' => ['required', Rule::exists('categories', 'id')],
    ]);
  }
}
