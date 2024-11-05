<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genre_id' => Genre::all()->random()->id,
            'title' => fake()->sentence(3),
            'published_year' => fake()->year(),
            'isbn' => fake()->unique()->isbn13(),
            'status' => fake()->randomElement(['available', 'reserved', 'loaned']),
        ];
    }
}
