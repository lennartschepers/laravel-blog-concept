<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // posts will automatically have ->with('category','author') queried everytime, can bypass this by specifying ->without()
  protected $with = ['category', 'author'];

  // trying out query scope
  public function scopeFilter($query, array $filters)
  {
    //use of php8 nullsafe operator, for if there is no 'search' in arr (default)
    $query->when(
      $filters['search'] ?? false,
      fn ($query, $search) =>
      $query->where(fn ($query) =>
      // standard sql 'like' syntax, the % is a wildcard that could be zero/one/multiple chars
      $query->where('title', 'like', '%' . request('search') . '%')
        ->orWhere('body', 'like', '%' . request('search') . '%'))
    );
    // for categories try with arrow fn
    $query->when(
      //below code works the same but could be done more efficiently, commented out for learning purposes
      $filters['category'] ?? false,
      fn ($query, $category) =>
      /* $query->whereExists(fn ($query) => */
      /* $query->from('categories') */
      /*   //whereColumn so 'posts.category_id' wont be taken as a literal string */
      /*   ->whereColumn('categories.id', 'posts.category_id') */
      /*   ->where('categories.slug', $category)) */
      $query->whereHas('category', fn ($query) => $query->where('slug', $category))
    );
    $query->when(
      $filters['author'] ?? false,
      fn ($query, $author) =>
      $query->whereHas('author', fn ($query) => $query->where('username', $author))
    );
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    //second arg of 'user_id' overwrites the default assumed relation to foreign key 'author_id' by laravel
    return $this->belongsTo(User::class, 'user_id');
  }
}
