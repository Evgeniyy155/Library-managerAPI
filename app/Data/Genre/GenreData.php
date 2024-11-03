<?php

namespace App\Data\Genre;

use Spatie\LaravelData\Data;

class GenreData extends Data
{
    public function __construct(
        public int $id,
        public string $name
    )
    {
    }

}
