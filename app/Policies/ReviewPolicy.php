<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    public function __construct()
    {
    }

    public function update(User $user, Review $review)
    {
        return ($user->id === $review->user_id ||
            in_array($user->role, UserRole::permittedRoles()));
    }

    public function destroy(User $user, Review $review)
    {
        return ($user->id === $review->user_id ||
            in_array($user->role, UserRole::permittedRoles()));
    }
}
