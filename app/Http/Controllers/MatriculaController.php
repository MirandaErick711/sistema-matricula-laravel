<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with(['estudiante.carrera'])
            ->withCount('detalles')
            ->latest()
            ->paginate(10);

        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $estudiantes = Estudiante::orderBy('apellidos')->get();
        return view('matriculas.create', compact('estudiantes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'semestre' => 'required|string|max:20',
            'fecha_matricula' => 'required|date',
            'estado' => 'required|in:Activa,Anulada,Finalizada',
        ]);

        $existe = Matricula::where('estudiante_id', $validated['estudiante_id'])
            ->where('semestre', $validated['semestre'])
            ->exists();

        if ($existe) {
            return back()->withInput()->withErrors([
                'estudiante_id' => 'El estudiante ya tiene una matrícula registrada en el semestre ' . $validated['semestre'],
            ]);
        }

        $matricula = Matricula::create($validated);

        return redirect()->route('matriculas.show', $matricula)
            ->with('success', 'Matrícula creada exitosamente. Ahora puedes agregar las asignaturas.');
    }

    public function show(Matricula $matricula)
    {
        $matricula->load([
            'estudiante.carrera',
            'detalles.horario.curso.docente',
            'detalles.horario.aula',
        ]);

        $totalCreditos = $matricula->detalles->sum(function ($detalle) {
            return $detalle->horario->curso->creditos ?? 0;
        });

        return view('matriculas.show', compact('matricula', 'totalCreditos'));
    }

    public function edit(Matricula $matricula)
    {
        $estudiantes = Estudiante::orderBy('apellidos')->get();
        return view('matriculas.edit', compact('matricula', 'estudiantes'));
    }

    public function update(Request $request, Matricula $matricula)
    {
        $validated = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'semestre' => 'required|string|max:20',
            'fecha_matricula' => 'required|date',
            'estado' => 'required|in:Activa,Anulada,Finalizada',
        ]);

        $existe = Matricula::where('estudiante_id', $validated['estudiante_id'])
            ->where('semestre', $validated['semestre'])
            ->where('id', '!=', $matricula->id)
            ->exists();

        if ($existe) {
            return back()->withInput()->withErrors([
                'estudiante_id' => 'El estudiante ya tiene otra matrícula registrada en el semestre ' . $validated['semestre'],
            ]);
        }

        $matricula->update($validated);

        return redirect()->route('matriculas.show', $matricula)
            ->with('success', 'Matrícula actualizada correctamente.');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect()->route('matriculas.index')
            ->with('success', 'Matrícula eliminada correctamente.');
    }
}
