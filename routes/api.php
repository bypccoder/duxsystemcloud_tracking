<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\FormPostVentaController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('postventa')->middleware('auth:api')->group(function () {
    // Rutas relacionadas con las task
    Route::get('news/{userid}', [FormPostVentaController::class, 'news']); // Lista de tareas nuevas
    Route::get('olds/{userid}', [FormPostVentaController::class, 'olds']); // Lista de tareas antiguas
    Route::get('/{id}', [FormPostVentaController::class, 'showforapp']); // Ver una tarea
    Route::post('/', [FormPostVentaController::class, 'storeapp']); // Registrar una tarea
    Route::put('/{id}', [FormPostVentaController::class, 'update']); // Modificar una tarea (falta crear su api)
});
