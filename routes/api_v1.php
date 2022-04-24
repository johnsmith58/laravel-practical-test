<?php

/**
 * API V1 Routes File
 * call inside api\v1\ controller file
 */

use App\Http\Controllers\api\v1\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\UserAuthController;

Route::post('auth/users/login', [UserAuthController::class, 'login']);
Route::post('auth/users/register', [UserAuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('survey-list', [SurveyController::class, 'index']);
    Route::get('survey-list/{id}', [SurveyController::class, 'show']);
});