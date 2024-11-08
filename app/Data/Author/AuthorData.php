<?php

namespace App\Data\Author;

use App\Traits\PaginationDataTrait;
use Spatie\LaravelData\Data;

class AuthorData extends Data
{
    use PaginationDataTrait;
    public function __construct(
        public int $id,
        public string $name
    )
    {
    }

}
