<?php

namespace App\Data\Email;

use Spatie\LaravelData\Data;

class EmailVerificationRequestData extends Data
{
    public function __construct(
      public string $id,
      public string $hash,
    ) {}
}
