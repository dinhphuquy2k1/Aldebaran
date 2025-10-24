<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Infrastructure\Discount\Models\Discount;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Src\Infrastructure\Discount\Models\Discount>
 */
class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('PROMO###'),
            'type' => 0,
            'start_at' => now()->startOfMonth(),
            'end_at' => now()->endOfMonth(),
            'usage_limit_total' => $this->faker->numberBetween(0, 100),
            'usage_limit_per_user' => $this->faker->numberBetween(0, 100),
            'apply_condition' => json_encode([
                'min_order' => 100000,
                'limit_per_user' => 1,
            ]),
        ];
    }
}
