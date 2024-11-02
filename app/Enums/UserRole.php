<?php

namespace App\Enums;

enum UserRole: string
{
    case USER = 'user';
    case LIBRARIAN = 'librarian';
    case ADMIN = 'admin';
}
