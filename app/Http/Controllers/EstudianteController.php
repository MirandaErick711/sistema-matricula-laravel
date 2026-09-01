<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Estudiante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstudianteController extends Controller
{
    public function index(Request $request): View
    {
        $query = Estudiante::with('carrera');

        // Buscar por DNI, nombres o apellidos
        if ($request->filled('buscar')) {
            $buscar = $request->buscar;

            $query->where(function ($q) use ($buscar) {
                $q->where('dni', 'like', "%{$buscar}%")
                ->orWhere('nombres', 'like', "%{$buscar}%")
                ->orWhere('apellidos', 'like', "%{$buscar}%");
            });
        }

        // Filtrar por carrera
        if ($request->filled('carrera_id')) {
            $query->where('carrera_id', $request->carrera_id);
        }

        $estudiantes = $query
            ->orderBy('apellidos')
            ->paginate(10)
            ->withQueryString();

        $carreras = Carrera::orderBy('nombre')->get();

        return view('estudiantes.index', compact(
            'estudiantes',
            'carreras'
        ));
    }

    public function create(): View
    {
        $carreras = Carrera::orderBy('nombre')->get();
        return view('estudiantes.create', compact('carreras'));
    }

    public function store(Request $request): RedirectResponse
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

    public function show(Estudiante $estudiante): View
    {
        $estudiante->load(['carrera', 'matriculas.detalles.horario.curso']);
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante): View
    {
        $carreras = Carrera::orderBy('nombre')->get();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    public function update(Request $request, Estudiante $estudiante): RedirectResponse
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

    public function destroy(Estudiante $estudiante): RedirectResponse
    {
        if ($estudiante->matriculas()->exists()) {
            return back()->with('error', 'No se puede eliminar el estudiante porque tiene matrículas registradas.');
        }

        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}
