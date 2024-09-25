<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $directory = 'public/storage/product_images';
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        return [
            'product_id' => Product::inRandomOrder()->first()->id,  // Create a related product using the Product factory
            'path' => 'product_images/' . $this->faker->image('public/storage/product_images', 100, 100, null, false),
        ];
    }
}
