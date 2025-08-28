<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Src\Infrastructure\Menu\Models\Menu;
use Src\Infrastructure\MenuGroup\Models\MenuGroup;


class MenuGroupSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $now = now();
        $menuGroups = [
            [
                'id' => 1,
                'name' => 'sales_channel',
                'description' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        MenuGroup::insert($menuGroups);
    }
}
