<?php

namespace App\Facades;

use App\Data\Email\EmailVerificationRequestData;
use App\Models\User;
use App\Services\EmailVerificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static JsonResponse getNotice(User $user)
 * @method static verify(EmailVerificationRequestData $data)
 * @method static JsonResponse resend(User $user)
 *
 * @see EmailVerificationService
 */
class EmailVerificationFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'emailVerificationService';
    }
}
