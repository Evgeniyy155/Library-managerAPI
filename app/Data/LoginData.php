<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Confirmed;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    public function __construct(
        #[Email, Max(255), Exists('users')]
        public string $email,
        #[Min(8)]
        public string $password,
    ) {}
}
