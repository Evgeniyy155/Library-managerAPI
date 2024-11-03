<?php

namespace App\Data\Genre;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class GenreRequestData extends Data
{
    public function __construct(
        #[Max(255)]
      public string $name
    ) {}
}
