<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'title' => $this->faker->words(rand(3, 5), true),
            'content' => $this->faker->text,
            'image' => $this->faker->sentence(1),
            'excerpts' => $this->faker->sentence(9),
            'status' => $this->faker->randomElement(['publish', 'draft']),
        ];
    }
}
