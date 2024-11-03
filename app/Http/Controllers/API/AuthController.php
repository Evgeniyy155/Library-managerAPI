<?php

namespace App\Http\Controllers\API;

use App\Data\Auth\LoginData;
use App\Data\Auth\RegisterData;
use App\Facades\UserFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterData $data): JsonResponse
    {
        return UserFacade::store($data);
    }

    public function login(LoginData $data): JsonResponse
    {
        return UserFacade::login($data);
    }

    public function logout(Request $request): JsonResponse
    {
        return UserFacade::logout($request->user());
    }
}
