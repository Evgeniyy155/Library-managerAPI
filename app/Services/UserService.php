<?php

namespace App\Services;

use App\Data\Auth\LoginData;
use App\Data\Auth\RegisterData;
use App\Data\User\UserData;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function store(RegisterData $data): JsonResponse
    {
        $user = User::query()->create($data->toArray());
        $user->refresh();
        event(new Registered($user));
        return responseSuccess('User registered successfully', ['user' => UserData::from($user)], status: 201);
    }

    public function login(LoginData $data): JsonResponse
    {
        $user = User::query()->where('email', $data->email)->firstOrFail();
        if(!$user || !Hash::check($data->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        $user->tokens()->delete();
        $token = $user->createToken($user->name)->plainTextToken;
        return responseSuccess('Login successful', ['user' => UserData::from($user), 'token' => $token]);
    }

    public function logout(User $user): JsonResponse
    {
        $user->tokens()->delete(); // $user->currentAccessToken()->delete();
        return responseSuccess('Logout successful');
    }
}
