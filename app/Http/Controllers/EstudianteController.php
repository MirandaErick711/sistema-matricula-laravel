<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $carreras = Carrera::orderBy('nombre')->get();
        return view('estudiantes.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|size:8|unique:estudiantes,dni',
            'email' => 'nullable|email|max:100',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        Estudiante::create($validated);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante registrado correctamente.');
    }

    public function show(Estudiante $estudiante)
    {
        $estudiante->load(['carrera', 'matriculas.detalles.horario.curso']);
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::orderBy('nombre')->get();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|size:8|unique:estudiantes,dni,' . $estudiante->id,
            'email' => 'nullable|email|max:100',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $estudiante->update($validated);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente.');
    }

    public function destroy(Estudiante $estudiante)
    {
        if ($estudiante->matriculas()->exists()) {
            return back()->with('error', 'No se puede eliminar el estudiante porque tiene matrículas registradas.');
        }

        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}
