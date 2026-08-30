<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Carrera;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with([
            'carreras',
            'prerrequisitos',
            'grupos'
        ])->paginate(10);

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $carreras = Carrera::all();

        $cursos = Curso::all();

        return view('cursos.create', compact(
            'carreras',
            'cursos'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:150',
            'creditos' => 'required|integer|min:1',
            'carreras' => 'nullable|array',
            'carreras.*' => 'exists:carreras,id',
            'prerrequisitos' => 'nullable|array',
            'prerrequisitos.*' => 'exists:cursos,id',
        ]);

        $curso = Curso::create([
            'nombre' => $validated['nombre'],
            'creditos' => $validated['creditos'],
        ]);

        $curso->carreras()->sync(
            $validated['carreras'] ?? []
        );

        $curso->prerrequisitos()->sync(
            $validated['prerrequisitos'] ?? []
        );

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso creado correctamente.');
    }

    public function show(Curso $curso)
    {
        $curso->load([
            'carreras',
            'prerrequisitos',
            'esPrerrequisitoDe',
            'grupos.docente',
            'grupos.aula',
            'grupos.semestre',
            'grupos.horarios',
        ]);

        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $carreras = Carrera::all();

        $cursos = Curso::where(
            'id',
            '!=',
            $curso->id
        )->get();

        $curso->load([
            'carreras',
            'prerrequisitos'
        ]);

        return view('cursos.edit', compact(
            'curso',
            'carreras',
            'cursos'
        ));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:150',
            'creditos' => 'required|integer|min:1',
            'carreras' => 'nullable|array',
            'carreras.*' => 'exists:carreras,id',
            'prerrequisitos' => 'nullable|array',
            'prerrequisitos.*' => 'exists:cursos,id',
        ]);

        $curso->update([
            'nombre' => $validated['nombre'],
            'creditos' => $validated['creditos'],
        ]);

        $curso->carreras()->sync(
            $validated['carreras'] ?? []
        );

        $curso->prerrequisitos()->sync(
            $validated['prerrequisitos'] ?? []
        );

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}