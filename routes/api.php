<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;

Route::group([

    'middleware' => ['api', 'auth'],
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('auth');
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('auth');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::prefix('otp')->group(function () {

        Route::post('verify', [AuthController::class, 'verifyOtp']);
        Route::post('resend', [AuthController::class, 'resendOtp']);

    });

});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('task')->group(function () {

        Route::post('create', [TaskController::class, 'create']);
        Route::get('show/{slug}', [TaskController::class, 'show']);
        Route::put('update/{slug}', [TaskController::class, 'update']);
        Route::delete('delete/{slug}', [TaskController::class, 'destroy']);

    });

    Route::prefix('group')->group(function () {

        Route::post('create', [GroupController::class, 'create']);
        Route::get('show/{slug}', [GroupController::class, 'show']);
        Route::put('update/{slug}', [GroupController::class, 'update']);
        Route::delete('delete/{slug}', [GroupController::class, 'destroy']);

    });

});