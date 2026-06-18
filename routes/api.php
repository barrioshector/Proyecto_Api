<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\FuncionesCargosController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('empleados', EmpleadosController::class);
    Route::apiResource('cargos', CargosController::class);
    Route::apiResource('funcionescargos', FuncionesCargosController::class);

});