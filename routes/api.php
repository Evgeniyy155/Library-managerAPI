<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\IssuanceController;
use App\Http\Controllers\API\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function (){
   Route::post('/register', 'register')->name('register');
   Route::post('/login', 'login')->name('login');
   Route::post('/logout', 'logout')->name('logout')
       ->middleware('auth:sanctum');
});

Route::apiResources([
    'genres' => GenreController::class,
    'authors' => AuthorController::class,
    'books' => BookController::class
]);

Route::apiResource('reservations', ReservationController::class)
    ->except('update')->middleware('auth:sanctum');

Route::controller(IssuanceController::class)->group(function (){
    Route::post('/issuances/{reservation}', 'store')->name('issuances.store');
    Route::put('/issuances/{issuance}/return', 'return')->name('issuances.return');
});
