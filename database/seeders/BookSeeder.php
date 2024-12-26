<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Book::factory(350)->create([
            \App\Models\Book::AUTHOR_ID_COLUMN => Author::query()->inRandomOrder()->first()->getId(),
        ]);
    }
}
