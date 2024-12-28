<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\BookDetails::factory(150)->create([
            \App\Models\BookDetails::BOOK_ID_COLUMN => Book::query()->inRandomOrder()->first()->getId(),
        ]);
    }
}
