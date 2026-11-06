<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'content' => fake()->sentence(),
            'slug' => strtolower(fake()->unique()->word()) // occhio che $fake->word, può rigenerare la stessa parola quindi potrebbe fallire perché slug è unique
        ];
    }
}
