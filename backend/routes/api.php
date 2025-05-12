<?php

use App\Http\Controllers\Api\V1\StoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('stories', StoryController::class);
});
