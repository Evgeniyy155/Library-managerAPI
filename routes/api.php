<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\IssuanceController;
use App\Http\Controllers\API\ReservationController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')
        ->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum', 'staffRoleOnly'])->group(function () {
    Route::apiResources([
        'genres' => GenreController::class,
        'authors' => AuthorController::class,
        'books' => BookController::class
    ], ['only' => ['store', 'update', 'delete']]);
});

Route::apiResources([
    'genres' => GenreController::class,
    'authors' => AuthorController::class,
    'books' => BookController::class
], ['only' => ['index', 'show']]);

Route::apiResource('reservations', ReservationController::class)
    ->except('update')->middleware('auth:sanctum');

Route::controller(IssuanceController::class)->middleware(['auth:sanctum', 'staffRoleOnly'])->group(function () {
    Route::post('/issuances/{reservation}', 'store')->name('issuances.store');
    Route::put('/issuances/{issuance}/return', 'return')->name('issuances.return');
});
