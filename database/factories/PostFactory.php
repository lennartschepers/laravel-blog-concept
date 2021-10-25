<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Post::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  //excerpt and body were bit hacky here, but I didn't come up with a cleaner method of extracting the text with tags from the array
  public function definition()
  {
    // for the fake images i will use the unique user ids, since for testing purposes every user has one post
    $user = User::factory()->create();
    return [
      'user_id' => $user,
      'category_id' => Category::factory(),
      'title' => $this->faker->sentence(),
      'thumbnail' => 'thumbnails/fake/print_' . $user->id . '.jpeg',
      'slug' => $this->faker->slug(),
      'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
      'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',

    ];
  }
}
