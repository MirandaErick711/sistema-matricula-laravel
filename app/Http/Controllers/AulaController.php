<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::withCount('horarios')->paginate(10);
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'capacidad' => 'required|integer|min:1',
        ]);

        Aula::create($validated);

        return redirect()->route('aulas.index')
            ->with('success', 'Aula creada correctamente.');
    }

    public function show(Aula $aula)
    {
        $aula->load('horarios.curso.docente');
        return view('aulas.show', compact('aula'));
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'capacidad' => 'required|integer|min:1',
        ]);

        $aula->update($validated);

        return redirect()->route('aulas.index')
            ->with('success', 'Aula actualizada correctamente.');
    }

    public function destroy(Aula $aula)
    {
        if ($aula->horarios()->exists()) {
            return back()->with('error', 'No se puede eliminar el aula porque tiene horarios asignados.');
        }

        $aula->delete();

        return redirect()->route('aulas.index')
            ->with('success', 'Aula eliminada correctamente.');
    }
}
