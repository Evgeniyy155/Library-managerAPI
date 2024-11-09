<?php

namespace App\Data\Review;

use App\Data\User\UserData;
use Spatie\LaravelData\Attributes\LoadRelation;
use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class ReviewData extends Data
{
    public function __construct(
        public int $id,
        #[Between(0, 5)]
        public int $rating,
        #[Max(255)]
        public string $comment,
        #[LoadRelation]
        public UserData $user
    ) {}
}
