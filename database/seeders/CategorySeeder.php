<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(5)->create([
            Category::PARENT_CATEGORY_ID_COLUMN => null,
        ]);

        Category::factory(15)->create([
            Category::PARENT_CATEGORY_ID_COLUMN => fake()->randomElement([
                Category::query()->inRandomOrder()->first()->getId(),
                null
            ]),
        ]);
    }
}
