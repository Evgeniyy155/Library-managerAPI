<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPublishedYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected int $currentYear;

    public function __construct()
    {
        $this->currentYear = date('Y');
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^\d{4}$/', $value)){
            $fail("The {$attribute} must be a valid four-digit year.");
        }
        $year = (int) $value;
        if($year > $this->currentYear){
            $fail("The {$attribute} must not exceed the current year ({$this->currentYear}).");
        }
    }
}
