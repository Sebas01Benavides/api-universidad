<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EstudianteController;
use Illuminate\Support\Facades\Route;

// Ruta pública para iniciar sesión
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

// Rutas privadas protegidas con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::apiResource('estudiantes', EstudianteController::class);
});