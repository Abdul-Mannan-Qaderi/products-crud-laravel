<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'quantity' => fake()->numberBetween(1, 100),
            'price' => fake()->randomFloat(2, 1, 1000),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'status' => fake()->randomElement(['active', 'inactive']),
            'image' => fake()->imageUrl(640, 480, 'products', true, 'Product Image', false) ,
            'created_at' => now(),
        ];
    }
}
