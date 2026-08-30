<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Curso;
use Illuminate\Http\Request;

class CarreraCursoController extends Controller
{
    public function edit(Carrera $carrera)
    {
        $cursos = Curso::orderBy('nombre')->get();

        $carrera->load('cursos');

        return view(
            'carrera_curso.edit',
            compact('carrera', 'cursos')
        );
    }

    public function update(Request $request, Carrera $carrera)
    {
        $validated = $request->validate([
            'cursos' => 'nullable|array',
            'cursos.*' => 'exists:cursos,id',
        ]);

        $carrera->cursos()->sync(
            $validated['cursos'] ?? []
        );

        return redirect()
            ->route('carreras.show', $carrera)
            ->with(
                'success',
                'Cursos de la carrera actualizados correctamente.'
            );
    }
}