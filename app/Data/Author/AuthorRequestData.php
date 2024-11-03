<?php

namespace App\Data\Author;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class AuthorRequestData extends Data
{
    public function __construct(
        #[Max(255)]
      public string $name
    ) {}
}
