<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\Comments\CommentController;
use App\Http\Controllers\API\V1\Feedback\FeedbackController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::prefix('v1')->group(function () {
    
        Route::post("login", [AuthController::class, "login"]);
        Route::post("register", [AuthController::class, "registerUser"]);
    
        Route::middleware('auth:sanctum')->group(function () {
            Route::post("add-feedback", [FeedbackController::class, "addFeedback"]);
            Route::get("get-all-feedback", [FeedbackController::class, "getAllFeedback"]);
            Route::get("get-feedback/{id}", [FeedbackController::class, "getFeedback"]);
        });
        Route::middleware('auth:sanctum')->group(function () {
            Route::post("add-comment", [CommentController::class, "addComment"]);
        });
    
    });

