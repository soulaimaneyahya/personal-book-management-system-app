<?php

namespace Database\Factories;

use App\Models\BookDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookDetails>
 */
class BookDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            BookDetails::DESCRIPTION_COLUMN => fake()->paragraph(3, true),
        ];
    }
}
