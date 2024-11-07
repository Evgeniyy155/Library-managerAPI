<?php

namespace App\Enums;

enum UserRole: string
{
    case USER = 'user';
    case LIBRARIAN = 'librarian';
    case ADMIN = 'admin';

    public static function permittedRoles(): array
    {
        return [
            self::LIBRARIAN->value,
            self::ADMIN->value,
        ];
    }
}
