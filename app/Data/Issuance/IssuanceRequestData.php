<?php

namespace App\Data\Issuance;

use Spatie\LaravelData\Attributes\Validation\Between;
use Spatie\LaravelData\Data;

class IssuanceRequestData extends Data
{
    public function __construct(
        #[Between(1,30)]
        public int $loan_duration
    )
    {
    }
}
