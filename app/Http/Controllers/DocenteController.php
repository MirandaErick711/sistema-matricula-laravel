<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::withCount('cursos')->paginate(10);
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);

        Docente::create($validated);

        return redirect()->route('docentes.index')
            ->with('success', 'Docente registrado correctamente.');
    }

    public function show(Docente $docente)
    {
        $docente->load('cursos.horarios.aula');
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
        ]);

        $docente->update($validated);

        return redirect()->route('docentes.index')
            ->with('success', 'Docente actualizado correctamente.');
    }

    public function destroy(Docente $docente)
    {
        if ($docente->cursos()->exists()) {
            return back()->with('error', 'No se puede eliminar el docente porque tiene cursos asignados.');
        }

        $docente->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente eliminado correctamente.');
    }
}
