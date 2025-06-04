<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;

Route::group([

    'middleware' => ['api', 'jwt.auth'],
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register'])->withoutMiddleware('jwt.auth');
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware('jwt.auth');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::prefix('otp')->group(function () {

        Route::post('verify', [AuthController::class, 'verifyOtp']);
        Route::post('resend', [AuthController::class, 'resendOtp']);

    });

});

Route::middleware(['jwt.auth', 'verified'])->group(function () {

    Route::prefix('task')->group(function () {

        Route::post('store', [TaskController::class, 'store']);
        Route::get('show/{task:slug}', [TaskController::class, 'show']);
        Route::put('update/{task:slug}', [TaskController::class, 'update']);
        Route::delete('delete/{task:slug}', [TaskController::class, 'destroy']);

    });

    Route::prefix('group')->group(function () {

        Route::post('store', [GroupController::class, 'store']);
        Route::get('show/{group:slug}', [GroupController::class, 'show']);
        Route::put('update/{group:slug}', [GroupController::class, 'update']);
        Route::delete('delete/{group:slug}', [GroupController::class, 'destroy']);

        Route::post('join', [MemberController::class, 'store']);

    });

    Route::prefix('home')->group(function () {

        Route::get('group', [GroupController::class, 'index']);
        Route::get('task', [TaskController::class, 'index']);

    });

});