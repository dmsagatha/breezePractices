<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  public function definition()
  {
    $categories = Category::pluck('id')->all();

    return [
      'category_id' => $this->faker->randomElement($categories),
      'title'       => $this->faker->unique()->sentence(),
      'content'     => $this->faker->text()
    ];
  }
}