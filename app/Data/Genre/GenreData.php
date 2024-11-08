<?php

namespace App\Data\Genre;

use App\Traits\PaginationDataTrait;
use Spatie\LaravelData\Data;

class GenreData extends Data
{
    use PaginationDataTrait;
    public function __construct(
        public int $id,
        public string $name
    )
    {
    }
}
