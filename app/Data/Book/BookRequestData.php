<?php

namespace App\Data\Book;

use Spatie\LaravelData\Data;

class BookRequestData extends Data
{
    public function __construct(
        public string $title,
        public array $authors,
        public int $genre_id,
        public string $isbn,
        public string $published_year
    )
    {
    }
}
