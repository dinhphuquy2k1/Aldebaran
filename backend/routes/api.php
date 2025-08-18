<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Src\Presentation\Category\Http\Controllers\API\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('/categories', [CategoryController::class, 'categories']);
});
