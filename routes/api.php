<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group([

        'prefix' => 'otp'
    ], function(){

        Route::post('verify', [AuthController::class, 'verifyOtp']);
        Route::post('resend', [AuthController::class, 'resendOtp']);
    
    });


});