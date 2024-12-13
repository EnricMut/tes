<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Http\Requests\ContestRequest;

class ContestController extends Controller
{
    public function index()
    {
        return response()->json(Contest::paginate(10));
    }

    public function store(ContestRequest $request)
    {
        try {
            //Validar los datos del formulario
            $validated = $request->validated();

            //Convertir timestamps a formato de fecha compatible con la base de datos
            $validated['dateStart'] = date('Y-m-d H:i:s', $validated['dateStart']);
            $validated['dateEnd'] = date('Y-m-d H:i:s', $validated['dateEnd']);

            //Crear el concurso
            $contest = Contest::create($validated);

            return response()->json([
                'message' => 'Contest created successfully!',
                'contest' => $contest
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error creating contest: ' . $e->getMessage()
            ], 500);
        }
    }


    public function show($id)
    {
        $contest = Contest::findOrFail($id);
        return response()->json($contest);
    }


    public function update(Request $request, $id)
{
    try {
        // Validar los datos del formulario
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'dateStart' => 'required|integer', // Timestamp esperado
            'dateEnd' => 'required|integer',  // Timestamp esperado
            'numCategories' => 'required|integer',
        ]);

        // Convertir timestamps a formato de fecha
        $validated['dateStart'] = date('Y-m-d H:i:s', (int) $validated['dateStart']);
        $validated['dateEnd'] = date('Y-m-d H:i:s', (int) $validated['dateEnd']);

        // Encontrar el concurso
        $contest = Contest::findOrFail($id);

        // Actualizar el concurso
        $contest->update($validated);

        return response()->json([
            'message' => 'Contest updated successfully!',
            'contest' => $contest
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error updating contest: ' . $e->getMessage()
        ], 500);
    }
}
}
