<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\StoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('stories', StoryController::class)->except('update');
    Route::apiResource('stories.chapters', ChapterController::class);
    Route::post('/register',[AuthController::class,'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function() {
        Route::delete('logout',[AuthController::class,'logout'])->name('logout');
        Route::get('me',[AuthController::class,'me'])->name('me');
    });
});
