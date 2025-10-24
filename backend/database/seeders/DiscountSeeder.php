<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Discount\Models\Discount;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        $discount = Discount::create([
            'code' => 'WF5T73058U7K',
            'type' => 0,
            'start_at' => now()->startOfMonth(),
            'end_at' => now()->endOfMonth(),
            'apply_condition' => json_encode(['']),
        ]);

        $rules = [
            ['day_of_week' => 1, 'start_time' => '00:00', 'end_time' => '01:00', 'all_day' => false],
            ['day_of_week' => 1, 'start_time' => '00:30', 'end_time' => '01:00', 'all_day' => false],
            ['day_of_week' => 3, 'start_time' => '00:00', 'end_time' => '01:00', 'all_day' => true],
        ];

        foreach ($rules as $rule) {
            $discount->timeRules()->create($rule);
        }

        $otherDiscounts = Discount::factory()->count(3)->create();
        $discount->combinableDiscounts()->attach(
            $otherDiscounts->pluck('id')->toArray()
        );

        foreach ($otherDiscounts as $other) {
            $other->combinableDiscounts()->attach($discount->id);
        }
    }
}

