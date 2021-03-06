<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    
    Route::post('login',    [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    // rotas autenticadas
    Route::middleware('auth:api')->group(function(){
        Route::apiResource('tasks', TaskController::class); // tasks API
        
        // tasks
        Route::get('me',         [AuthController::class, 'me']);
        Route::get('refresh',    [AuthController::class, 'refresh']);
        Route::get('logout',     [AuthController::class, 'logout']);
        Route::get('invalidate', [AuthController::class, 'invalidate']);
    });
});