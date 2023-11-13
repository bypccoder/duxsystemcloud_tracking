<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\FormPostSaleController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::prefix('postventa')->middleware('auth:api')->group(function () {
    // Rutas relacionadas con las task
    Route::get('news/{userid}', [FormPostSaleController::class, 'news']); // Lista de tareas nuevas
    Route::get('olds/{userid}', [FormPostSaleController::class, 'olds']); // Lista de tareas antiguas
    Route::get('/{id}', [FormPostSaleController::class, 'showforapp']); // Ver una tarea
    Route::post('/', [FormPostSaleController::class, 'storeapp']); // Registrar una tarea
    //Route::put('/{id}', [FormPostSaleController::class, 'update']); // Modificar una tarea (falta crear su api)
});

Route::prefix('task')->middleware('auth:api')->group(function () {
    Route::post('saved/', [FormPostSaleController::class, 'newTask']); // Modificar una tarea (falta crear su api)
});
