<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reservedAt = $this->faker->dateTimeBetween('-1 month', 'now');
        $expiresAt = Carbon::instance($reservedAt)->addDays(collect([7,14])->random());
        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'book_id' => Book::query()->where('status', '=', 'available')
                ->inRandomOrder()->first()->id,
            'reserved_at' => $reservedAt,
            'expires_at' => $expiresAt,
        ];
    }
}
