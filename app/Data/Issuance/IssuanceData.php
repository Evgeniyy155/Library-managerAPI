<?php

namespace App\Data\Issuance;

use App\Data\Book\BookData;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\LoadRelation;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Transformers\DateTimeInterfaceTransformer;

class IssuanceData extends Data
{
    public function __construct(
        public int $id,
        public int $user_id,
        #[LoadRelation]
        public BookData $book,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd-m-Y')]
        public Carbon $issued_at,
        #[WithTransformer(DateTimeInterfaceTransformer::class, format: 'd-m-Y')]
        public Carbon $due_date
    ) {}
}
