<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConcursoController;

// Ruta de prueba con datos
Route::get('/test', function () {
    $data = [
        "name" => "Enric",
        "age" => 21
    ];
    return view('test', $data);
});

// Ruta de prueba sin datos
Route::get('/test2', fn() => view('test2'))->name('test2');

// Rutas para concursos
Route::prefix('contests')->group(function () {
    // Listar concursos
    Route::get('/', [ConcursoController::class, 'mostrarConcursos'])->name('contests.index');

    // Crear nuevo concurso
    Route::get('/create', [ConcursoController::class, 'create'])->name('contests.create');
    Route::post('/', [ConcursoController::class, 'store'])->name('contests.store');  // Ruta para almacenar el concurso

    // Editar concurso existente
    Route::get('/edit/{id}', [ConcursoController::class, 'edit'])->name('contests.edit');
    Route::put('/edit/{id}', [ConcursoController::class, 'update'])->name('contests.update');  // Ruta para actualizar el concurso

    // Ver detalles de un concurso
    Route::get('/{id}', [ConcursoController::class, 'show'])->name('contests.show');
});
