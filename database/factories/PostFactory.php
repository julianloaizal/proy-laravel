<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
			'author_id' => $this->faker->name,
			'category_id' => $this->faker->name,
			'title' => $this->faker->name,
			'seo_title' => $this->faker->name,
			'excerpt' => $this->faker->name,
			'body' => $this->faker->name,
			'image' => $this->faker->name,
			'slug' => $this->faker->name,
			'meta_description' => $this->faker->name,
			'meta_keywords' => $this->faker->name,
			'status' => $this->faker->name,
			'featured' => $this->faker->name,
        ];
    }
}
