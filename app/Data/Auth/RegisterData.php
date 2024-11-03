<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Attributes\Validation\Confirmed;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class RegisterData extends Data
{
    public function __construct(
        #[Max(255), Min(4)]
        public string $name,
        #[Email, Max(255), Unique('users')]
        public string $email,
        #[Min(8), Confirmed]
        public string $password,
        #[Min(8)]
        public string $password_confirmation
    ) {}
}
