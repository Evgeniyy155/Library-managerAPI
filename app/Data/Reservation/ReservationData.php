<?php

namespace App\Data\Reservation;

use App\Data\Book\BookData;
use App\Data\User\UserData;
use App\Traits\PaginationDataTrait;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\LoadRelation;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class ReservationData extends Data
{
    use PaginationDataTrait;
    public function __construct(
        public int $id,
        #[LoadRelation]
        public UserData $user,
        public int $user_id,
        #[LoadRelation]
        public BookData $book,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd-m-Y')]
        public Carbon $reserved_at,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd-m-Y')]
        public Carbon $expires_at
    )
    {
    }
}
