<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docente;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['docente'])->withCount('horarios')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $docentes = Docente::orderBy('apellidos')->get();
        return view('cursos.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:20|unique:cursos,codigo',
            'nombre' => 'required|string|max:150',
            'creditos' => 'required|integer|min:1|max:10',
            'docente_id' => 'nullable|exists:docentes,id',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso registrado correctamente.');
    }

    public function show(Curso $curso)
    {
        $curso->load(['docente', 'horarios.aula']);
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $docentes = Docente::orderBy('apellidos')->get();
        return view('cursos.edit', compact('curso', 'docentes'));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|max:20|unique:cursos,codigo,' . $curso->id,
            'nombre' => 'required|string|max:150',
            'creditos' => 'required|integer|min:1|max:10',
            'docente_id' => 'nullable|exists:docentes,id',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->horarios()->exists()) {
            return back()->with('error', 'No se puede eliminar el curso porque tiene horarios asignados.');
        }

        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}
