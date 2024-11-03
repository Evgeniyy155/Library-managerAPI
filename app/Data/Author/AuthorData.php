<?php

namespace App\Data\Author;

use Spatie\LaravelData\Data;

class AuthorData extends Data
{
    public function __construct(
        public int $id,
        public string $name
    )
    {
    }

}
