<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // truncating is necessary to avoid errors on php artisan db:seed
    /* User::truncate(); */
    /* Category::truncate(); */
    /* Post::truncate(); */

    //make 5 specific posts where user is someone with name john doe 
    /* $user = User::factory()->create( */
    /*   [ */
    /*     'name' => 'John Doe' */
    /*   ] */
    /* ); */
    /* Post::factory(5)->create([ */
    /*   'user_id' => $user->id */
    /* ]); */

    // old method of seeding, now the factory method is preferred. Will keep this here for learning purposes
    /* $user = User::factory()->create(); */

    /*     $personal = Category::create([ */
    /*       'name' => 'Personal', */
    /*       'slug' => 'personal' */
    /*     ]); */

    /*     $family = Category::create([ */
    /*       'name' => 'Family', */
    /*       'slug' => 'family' */
    /*     ]); */

    /*     $work = Category::create([ */
    /*       'name' => 'Work', */
    /*       'slug' => 'work' */
    /*     ]); */

    /*     Post::create([ */
    /*       'user_id' => $user->id, */
    /*       'category_id' => $family->id, */
    /*       'title' => 'My family post', */
    /*       'slug' => 'my-family-post', */
    /*       'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>', */
    /*       'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>' */
    /*     ]); */

    /*     Post::create([ */
    /*       'user_id' => $user->id, */
    /*       'category_id' => $work->id, */
    /*       'title' => 'My work post', */
    /*       'slug' => 'my-work-post', */
    /*       'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>', */
    /*       'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>' */
    /*     ]); */
  }
}
