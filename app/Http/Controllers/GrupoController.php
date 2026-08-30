<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Grupo;
use App\Models\SemestreAcademico;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with([
            'curso',
            'semestre',
            'docente',
            'aula'
        ])
        ->latest()
        ->paginate(10);

        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        $cursos = Curso::orderBy('nombre')->get();
        $semestres = SemestreAcademico::orderByDesc('fecha_inicio')->get();
        $docentes = Docente::orderBy('apellidos')->get();
        $aulas = Aula::orderBy('nombre')->get();

        return view(
            'grupos.create',
            compact(
                'cursos',
                'semestres',
                'docentes',
                'aulas'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'semestre_id' => 'required|exists:semestres_academicos,id',
            'docente_id' => 'required|exists:docentes,id',
            'aula_id' => 'required|exists:aulas,id',
            'nombre' => 'required|string|max:20',
            'capacidad' => 'required|integer|min:1',
        ]);

        Grupo::create($validated);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo creado correctamente.');
    }

    public function show(Grupo $grupo)
    {
        $grupo->load([
            'curso',
            'semestre',
            'docente',
            'aula',
            'horarios'
        ]);

        return view('grupos.show', compact('grupo'));
    }

    public function edit(Grupo $grupo)
    {
        $cursos = Curso::orderBy('nombre')->get();
        $semestres = SemestreAcademico::orderByDesc('fecha_inicio')->get();
        $docentes = Docente::orderBy('apellidos')->get();
        $aulas = Aula::orderBy('nombre')->get();

        return view(
            'grupos.edit',
            compact(
                'grupo',
                'cursos',
                'semestres',
                'docentes',
                'aulas'
            )
        );
    }

    public function update(Request $request, Grupo $grupo)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'semestre_id' => 'required|exists:semestres_academicos,id',
            'docente_id' => 'required|exists:docentes,id',
            'aula_id' => 'required|exists:aulas,id',
            'nombre' => 'required|string|max:20',
            'capacidad' => 'required|integer|min:1',
        ]);

        $grupo->update($validated);

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo actualizado correctamente.');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()
            ->route('grupos.index')
            ->with('success', 'Grupo eliminado correctamente.');
    }
}