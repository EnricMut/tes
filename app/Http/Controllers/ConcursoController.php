<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ConcursoController extends Controller
{
    public function mostrarConcursos()
    {
        // Obtener todos los concursos
        $contests = Contest::all();
        return view('contest', compact('contests'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date',
            'numCategories' => 'required|integer',
        ]);

        // Crear el nuevo concurso
        Contest::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('contests.create')->with('success', 'Concurso creado exitosamente');
    }

    public function edit($id)
    {
        // Obtener el concurso por ID (usando 'idContest' como clave primaria)
        $contest = Contest::where('idContest', $id)->firstOrFail();

        // Devolver la vista de edición con el concurso
        return view('edit', compact('contest'));
    }
}
