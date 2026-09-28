<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\StockAudit;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockAuditDetailFactory extends Factory
{
    public function definition(): array
    {
        $systemStock = fake()->numberBetween(10, 100);
        $actualStock = fake()->numberBetween(10, 100);

        return [
            'audit_id' => StockAudit::factory(),
            'product_id' => Product::factory(),
            'system_stock' => $systemStock,
            'actual_stock' => $actualStock,
            'difference' => $actualStock - $systemStock,
        ];
    }
}