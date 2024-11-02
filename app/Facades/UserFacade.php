<?php

namespace App\Facades;

use App\Data\LoginData;
use App\Data\RegisterData;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static JsonResponse store(RegisterData $data)
 * @method static JsonResponse login(LoginData $data)
 * @method static JsonResponse logout(User $user)
 *
 * @see UserService
 */
class UserFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'userService';
    }
}
