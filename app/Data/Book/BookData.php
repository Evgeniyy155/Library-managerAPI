<?php

namespace App\Data\Book;

use App\Data\Author\AuthorData;
use App\Data\Genre\GenreData;
use App\Traits\PaginationDataTrait;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Attributes\LoadRelation;
use Spatie\LaravelData\Data;

class BookData extends Data
{
    use PaginationDataTrait;
    /**
     * @param Collection<AuthorData> $authors
     */
    public function __construct(
        public int $id,
        public string $title,
        #[LoadRelation]
        public GenreData $genre,
        public string $published_year,
        public string $isbn,
        #[LoadRelation]
        public Collection $authors,
    ) {}

}
