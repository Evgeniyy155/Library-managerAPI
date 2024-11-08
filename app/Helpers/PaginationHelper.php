<?php

namespace App\Helpers;

class PaginationHelper
{
    public static function getPerPage(): int
    {
        return env('PAGINATION_PER_PAGE', 10);
    }
}
