<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,  // Generates a random word for product name
            'description' => $this->faker->sentence,  // Generates a random sentence for the description
            'user_id' => User::factory(),  // Generates a user using the User factory
            'is_active' => $this->faker->boolean(80),  // 80% chance of being true (active)
            'auction' => $this->faker->boolean(20),
        ];
    }
}
