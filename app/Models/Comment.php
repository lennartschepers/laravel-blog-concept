<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;


  public function post()
  {
    return $this->belongsTo(Post::class); //default to post_id
  }

  public function author() // default to author_id, which wouldn't be correct
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
