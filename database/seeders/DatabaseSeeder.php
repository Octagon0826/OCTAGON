<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockAudit;
use App\Models\StockAuditDetail;
use App\Models\StockMovement;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // 1. USER
        // =========================
        $users = User::factory(3)->create();

        // =========================
        // 2. PRODUCT
        // =========================
        $products = Product::factory(5)->create();

        // =========================
        // 3. TRANSACTION
        // =========================
        $transactions = Transaction::factory(10)
            ->for($users->random())
            ->create();

        // =========================
        // 4. TRANSACTION DETAIL
        // =========================
        foreach ($transactions as $transaction) {
            $quantity = fake()->numberBetween(1, 5);
            $price = $products->random()->selling_price;

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $products->random()->id,
                'quantity' => $quantity,
                'price' => $price,
                'subtotal' => $quantity * $price,
            ]);
        }

        // =========================
        // 5. STOCK MOVEMENT
        // =========================
        foreach ($products as $product) {
            StockMovement::create([
                'product_id' => $product->id,
                'user_id' => $users->random()->id,
                'date' => fake()->date(),
                'type' => fake()->randomElement([
                    'in',
                    'out',
                ]),
                'quantity' => fake()->numberBetween(1, 20),
                'description' => fake()->sentence(),
            ]);
        }

        // =========================
        // 6. STOCK AUDIT
        // =========================
        $audits = StockAudit::factory(3)
            ->for($users->random())
            ->create();

        // =========================
        // 7. STOCK AUDIT DETAIL
        // =========================
        foreach ($audits as $audit) {
            $product = $products->random();

            $systemStock = $product->stock;
            $actualStock = fake()->numberBetween(
                max(0, $systemStock - 5),
                $systemStock + 5
            );

            StockAuditDetail::create([
                'audit_id' => $audit->id,
                'product_id' => $product->id,
                'system_stock' => $systemStock,
                'actual_stock' => $actualStock,
                'difference' => $actualStock - $systemStock,
            ]);
        }
    }
}