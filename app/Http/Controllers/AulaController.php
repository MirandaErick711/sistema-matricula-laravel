<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AulaController extends Controller
{
    public function index(): View
    {
        $aulas = Aula::withCount('horarios')->paginate(10);
        return view('aulas.index', compact('aulas'));
    }

    public function create(): View
    {
        return view('aulas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'capacidad' => 'required|integer|min:1',
        ]);

        Aula::create($validated);

        return redirect()->route('aulas.index')
            ->with('success', 'Aula creada correctamente.');
    }

    public function show(Aula $aula): View
    {
        $aula->load('horarios.curso.docente');
        return view('aulas.show', compact('aula'));
    }

    public function edit(Aula $aula): View
    {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'capacidad' => 'required|integer|min:1',
        ]);

        $aula->update($validated);

        return redirect()->route('aulas.index')
            ->with('success', 'Aula actualizada correctamente.');
    }

    public function destroy(Aula $aula): RedirectResponse
    {
        if ($aula->horarios()->exists()) {
            return back()->with('error', 'No se puede eliminar el aula porque tiene horarios asignados.');
        }

        $aula->delete();

        return redirect()->route('aulas.index')
            ->with('success', 'Aula eliminada correctamente.');
    }
}
