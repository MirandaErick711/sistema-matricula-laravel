<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        $carreras = Carrera::withCount('estudiantes')->paginate(10);
        return view('carreras.index', compact('carreras'));
    }

    public function create()
    {
        return view('carreras.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:carreras,nombre',
        ]);

        Carrera::create($validated);

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera creada correctamente.');
    }

    public function show(Carrera $carrera)
    {
        $carrera->load('estudiantes');
        return view('carreras.show', compact('carrera'));
    }

    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    public function update(Request $request, Carrera $carrera)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:carreras,nombre,' . $carrera->id,
        ]);

        $carrera->update($validated);

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera actualizada correctamente.');
    }

    public function destroy(Carrera $carrera)
    {
        if ($carrera->estudiantes()->exists()) {
            return back()->with('error', 'No se puede eliminar la carrera porque tiene estudiantes asociados.');
        }

        $carrera->delete();

        return redirect()->route('carreras.index')
            ->with('success', 'Carrera eliminada correctamente.');
    }
}
