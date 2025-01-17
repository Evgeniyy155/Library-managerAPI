<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\EmailVerificationController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\IssuanceController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\ReviewController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/logout', 'logout')->name('logout');
        Route::get('/user', 'show')->name('user.show');
    });
});

Route::middleware(['auth:sanctum', 'staffRoleOnly'])->group(function () {
    Route::apiResources([
        'genres' => GenreController::class,
        'authors' => AuthorController::class,
        'books' => BookController::class
    ], ['only' => ['store', 'update', 'destroy']]);
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

Route::controller(ReviewController::class)->middleware('auth:sanctum')->as('reviews.')->group(function () {
    Route::get('/{type}/{id}/reviews', 'index')->name('index');
    Route::post('/{type}/{id}/reviews', 'store')->name('store');
    Route::get('/reviews/{review}', 'show')->name('show');
    Route::put('/reviews/{review}', 'update')
        ->middleware('can:update,review')->name('update');
    Route::delete('/reviews/{review}', 'destroy')
        ->middleware('can:destroy,review')->name('delete');
});

Route::controller(EmailVerificationController::class)->as('verification.')->prefix('email')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::get('/verify', 'notice')->name('notice');
        Route::get('/verification-notification', 'resend')->middleware('throttle:3,1')->name('send');
    });
