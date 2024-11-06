<?php

namespace App\Attributes\Validation;

use Attribute;
use Spatie\LaravelData\Attributes\Validation\Exists;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class ExistsAvailableBook extends Exists
{
    public function __construct()
    {
        parent::__construct('books', 'id', where: fn ($query) => $query->where('status', 'available'));
    }
}
