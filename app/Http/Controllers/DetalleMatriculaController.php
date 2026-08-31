<?php

namespace App\Http\Controllers;

use App\Models\DetalleMatricula;
use App\Models\Horario;
use App\Models\Matricula;
use Illuminate\Http\Request;

class DetalleMatriculaController extends Controller
{
    public function create(Matricula $matricula)
    {
        $matricula->load(['estudiante.carrera', 'detalles.horario.curso']);

        // Listar todos los horarios disponibles
        $horarios = Horario::with(['curso.docente', 'aula'])
            ->withCount('detallesMatricula')
            ->get();

        return view('detalle_matricula.create', compact('matricula', 'horarios'));
    }

    public function store(Request $request, Matricula $matricula)
    {
        if ($matricula->estado !== 'Activa') {
            return back()->withErrors([
                'horario_id' => 'No se pueden agregar asignaturas a una matrícula que no está activa.',
            ]);
        }

        $validated = $request->validate([
            'horario_id' => 'required|exists:horarios,id',
        ]);

        $horarioNuevo = Horario::with(['curso', 'aula'])->findOrFail($validated['horario_id']);

        // 1. Verificar si ya tiene matriculado este horario exacto
        $yaMatriculado = DetalleMatricula::where('matricula_id', $matricula->id)
            ->where('horario_id', $horarioNuevo->id)
            ->exists();

        if ($yaMatriculado) {
            return back()->withErrors([
                'horario_id' => 'Este horario ya se encuentra registrado en la matrícula.',
            ]);
        }

        // 2. Verificar si ya tiene matriculado el mismo curso
        $mismoCurso = DetalleMatricula::where('matricula_id', $matricula->id)
            ->whereHas('horario', function ($q) use ($horarioNuevo) {
                $q->where('curso_id', $horarioNuevo->curso_id);
            })->exists();

        if ($mismoCurso) {
            return back()->withErrors([
                'horario_id' => 'El estudiante ya tiene matriculada la asignatura "' . $horarioNuevo->curso->nombre . '".',
            ]);
        }

        // 3. Verificar capacidad del aula
        $matriculadosEnHorario = DetalleMatricula::where('horario_id', $horarioNuevo->id)->count();
        if ($matriculadosEnHorario >= $horarioNuevo->aula->capacidad) {
            return back()->withErrors([
                'horario_id' => 'El aula asignada a este horario ha alcanzado su capacidad máxima (' . $horarioNuevo->aula->capacidad . ' alumnos).',
            ]);
        }

        // 4. Verificar cruces de horario con las asignaturas ya matriculadas
        $horariosExistentes = $matricula->detalles()->with('horario')->get()->pluck('horario');
        foreach ($horariosExistentes as $existente) {
            if ($existente->dia === $horarioNuevo->dia) {
                if ($horarioNuevo->hora_inicio < $existente->hora_fin && $horarioNuevo->hora_fin > $existente->hora_inicio) {
                    return back()->withErrors([
                        'horario_id' => 'Cruce de horario: coincide el día ' . $horarioNuevo->dia . ' con ' . $existente->curso->nombre . ' (' . substr($existente->hora_inicio, 0, 5) . ' - ' . substr($existente->hora_fin, 0, 5) . ').',
                    ]);
                }
            }
        }

        // Registrar detalle
        DetalleMatricula::create([
            'matricula_id' => $matricula->id,
            'horario_id' => $horarioNuevo->id,
        ]);

        return redirect()->route('matriculas.show', $matricula)
            ->with('success', 'Asignatura agregada correctamente a la matrícula.');
    }

    public function destroy(Matricula $matricula, DetalleMatricula $detalle)
    {
        if ($detalle->matricula_id !== $matricula->id) {
            abort(404);
        }

        $detalle->delete();

        return redirect()->route('matriculas.show', $matricula)
            ->with('success', 'Asignatura retirada de la matrícula.');
    }
}
