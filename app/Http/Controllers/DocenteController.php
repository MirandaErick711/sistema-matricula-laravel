<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocenteController extends Controller
{
    public function index(): View
    {
        $docentes = Docente::withCount('cursos')->paginate(10);
        return view('docentes.index', compact('docentes'));
    }

    public function create(): View
    {
        return view('docentes.create');
    }

    public function store(Request $request): RedirectResponse
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

    public function show(Docente $docente): View
    {
        $docente->load('cursos.horarios.aula');
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docente $docente): View
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente): RedirectResponse
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

    public function destroy(Docente $docente): RedirectResponse
    {
        if ($docente->cursos()->exists()) {
            return back()->with('error', 'No se puede eliminar el docente porque tiene cursos asignados.');
        }

        $docente->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'Docente eliminado correctamente.');
    }
}
