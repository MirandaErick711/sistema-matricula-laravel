<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')
            ->latest()
            ->paginate(10);

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
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        Estudiante::create($validated);

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante registrado correctamente.');
    }

    public function show(Estudiante $estudiante)
    {
        $estudiante->load([
            'carrera',
            'matriculas'
        ]);

        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::orderBy('nombre')->get();

        return view(
            'estudiantes.edit',
            compact('estudiante', 'carreras')
        );
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => [
                'required',
                'string',
                'size:8',
                Rule::unique('estudiantes', 'dni')
                    ->ignore($estudiante->id),
            ],
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $estudiante->update($validated);

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante actualizado correctamente.');
    }
    
    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()
            ->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}