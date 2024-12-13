<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContestController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/create-contest', [ContestController::class, 'store']);

Route::get('/contest/{id}', [ContestController::class, 'show']); // Obtener un concurso
Route::put('/contest/{id}', [ContestController::class, 'update']); // Actualizar un concurso

