<?php

use App\Http\Controllers\API\AuthController;
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