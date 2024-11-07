<?php

use App\Http\Middleware\RoleAuthorizationMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'staffRoleOnly' => RoleAuthorizationMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValidationException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $e->errors(),
                ], 422);
            }
        });
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\HttpException $e, \Illuminate\Http\Request $request){
            if($request->is('api/*')){
                $statusCode = $e->getStatusCode() ?: 500;
                $message = match ($statusCode){
                    401 => 'Unauthorized',
                    403 => 'Forbidden',
                    404 => 'Record not found',
                    405 => 'Method Not Allowed',
                    500 => 'Internal Server Error',
                    501 => 'Not Implemented',
                    502 => 'Bad Gateway',
                    default => 'Whoops, looks like something went wrong',
                };
                return response()->json([
                    'message' => $message
                ], $e->getStatusCode() ?? 500);
            }
        });
    })->create();
