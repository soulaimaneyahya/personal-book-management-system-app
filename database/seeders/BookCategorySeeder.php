<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table(BookCategory::TABLE)->insert([
                BookCategory::BOOK_ID_COLUMN => Book::query()->inRandomOrder()->first()->getId(),
                BookCategory::CATEGORY_ID_COLUMN => Category::query()->inRandomOrder()->first()->getId(),
                BookCategory::CREATED_AT_COLUMN => \Carbon\Carbon::now(),
                BookCategory::UPDATED_AT_COLUMN => \Carbon\Carbon::now(),
            ]);
        }
    }
}
