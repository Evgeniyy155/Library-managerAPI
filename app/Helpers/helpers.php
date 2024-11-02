<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('responseSuccess')){
    function responseSuccess(string $message, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            'message' => $message
        ], $data));
    }
}
