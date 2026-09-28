<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Es Teh',
                'Pentol',
                'Es Jeruk',
                'Tahu Bakso',
                'Mie Instan',
            ]),
            'category' => fake()->randomElement([
                'Minuman',
                'Makanan',
            ]),
            'unit' => 'pcs',
            'stock' => fake()->numberBetween(10, 100),
            'selling_price' => fake()->randomFloat(2, 3000, 15000),
        ];
    }
}