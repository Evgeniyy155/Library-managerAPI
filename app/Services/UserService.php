<?php

namespace App\Services;

use App\Data\Auth\LoginData;
use App\Data\Auth\RegisterData;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function store(RegisterData $data): JsonResponse
    {
        User::query()->create($data->toArray());
        return responseSuccess('User registered successfully', status: 201);
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
        return responseSuccess('Login successful', compact('token'));
    }

    public function logout(User $user): JsonResponse
    {
        $user->tokens()->delete(); // $user->currentAccessToken()->delete();
        return responseSuccess('Logout successful');
    }
}
