<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;
use App\Models\Aula;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['docente', 'aula'])->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $docentes = Docente::all();
        $aulas = Aula::all();
        $cursos = Curso::all();
        return view('cursos.create', compact('docentes', 'aulas', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'creditos' => 'required|integer|min:1',
            'docente_id' => 'required|exists:docentes,id',
            'aula_id' => 'required|exists:aulas,id',
            'prerrequisitos' => 'nullable|array',
            'prerrequisitos.*' => 'exists:cursos,id',
        ]);

        $curso = Curso::create($request->only(['nombre', 'creditos', 'docente_id', 'aula_id']));

        if ($request->filled('prerrequisitos')) {
            $curso->prerrequisitos()->sync($request->prerrequisitos);
        }

        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente.');
    }

    public function show(Curso $curso)
    {
        $curso->load(['docente', 'aula', 'prerrequisitos']);
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $docentes = Docente::all();
        $aulas = Aula::all();
        $cursos = Curso::where('id', '!=', $curso->id)->get();
        $curso->load('prerrequisitos');
        return view('cursos.edit', compact('curso', 'docentes', 'aulas', 'cursos'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'creditos' => 'required|integer|min:1',
            'docente_id' => 'required|exists:docentes,id',
            'aula_id' => 'required|exists:aulas,id',
            'prerrequisitos' => 'nullable|array',
            'prerrequisitos.*' => 'exists:cursos,id',
        ]);

        $curso->update($request->only(['nombre', 'creditos', 'docente_id', 'aula_id']));
        $curso->prerrequisitos()->sync($request->prerrequisitos ?? []);

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado.');
    }

    public function destroy(Curso $curso)
    {
        $curso->prerrequisitos()->detach();
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado.');
    }
}