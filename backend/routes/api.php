<?php

use App\Http\Controllers\Api\V1\ChapterController;
use App\Http\Controllers\Api\V1\StoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('stories', StoryController::class);
    Route::apiResource('stories.chapters', ChapterController::class);
});
