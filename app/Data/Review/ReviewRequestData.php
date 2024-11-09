<?php

namespace App\Data\Review;

use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class ReviewRequestData extends Data
{
    public function __construct(
        #[Between(0, 5)]
        public int $rating,
        #[Max(255)]
        public string $comment
    ) {}
}
