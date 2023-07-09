<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        $slug = Str::slug($title);
        $description = fake()->paragraph(200);
        $excerpt = Str::words($description, 50, '...');
        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'excerpt' => $excerpt,
            'user_id' => rand(1, 11),
            'category_id' => rand(1, 5)
        ];
    }
}
