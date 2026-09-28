<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockMovementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'user_id' => User::factory(),
            'date' => fake()->date(),
            'type' => fake()->randomElement([
                'in',
                'out',
            ]),
            'quantity' => fake()->numberBetween(1, 20),
            'description' => fake()->sentence(),
        ];
    }
}