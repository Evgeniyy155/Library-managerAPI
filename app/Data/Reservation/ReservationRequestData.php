<?php

namespace App\Data\Reservation;

use App\Attributes\Validation\ExistsAvailableBook;
use App\Enums\BookStatus;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;

class ReservationRequestData extends Data
{
    public function __construct(
        #[ExistsAvailableBook]
        public int $book_id,
        #[In(7,14)]
        public int $duration,
    )
    {
    }
}
