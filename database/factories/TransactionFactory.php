<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'date' => fake()->date(),
            'type' => fake()->randomElement([
                'income',
                'expense',
            ]),
            'total' => fake()->randomFloat(2, 5000, 100000),
            'description' => fake()->sentence(),
        ];
    }
}