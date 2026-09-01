<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Horario;
use App\Models\Docente;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index(Request $request)
    {
        $aulas = Aula::orderBy('nombre')->get();
        $docentes = Docente::all(); 

        $modoCalendario = $request->filled('aula_id') || $request->filled('docente_id');

        $query = Horario::with(['curso.docente', 'aula']);

        if ($modoCalendario) {
            if ($request->filled('aula_id')) {
                $query->where('aula_id', $request->aula_id);
            } elseif ($request->filled('docente_id')) {
                $query->whereHas('curso', function($q) use ($request) {
                    $q->where('docente_id', $request->docente_id);
                });
            }

            $horarios = $query->orderByRaw("FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado')")
                              ->orderBy('hora_inicio')
                              ->get();
        } else {
            $horarios = $query->paginate(10);
        }

        return view('horarios.index', compact('horarios', 'aulas', 'docentes', 'modoCalendario'));
    }

    public function create()
    {
        $cursos = Curso::orderBy('nombre')->get();
        $aulas = Aula::orderBy('nombre')->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        return view('horarios.create', compact('cursos', 'aulas', 'dias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $cruceAula = Horario::where('aula_id', $validated['aula_id'])
            ->where('dia', $validated['dia'])
            ->where(function ($query) use ($validated) {
                $query->where('hora_inicio', '<', $validated['hora_fin'])
                      ->where('hora_fin', '>', $validated['hora_inicio']);
            })
            ->exists();

        if ($cruceAula) {
            return back()->withInput()->withErrors([
                'aula_id' => 'El aula seleccionada ya está ocupada en ese día y rango horario.',
            ]);
        }

        Horario::create($validated);

        return redirect()->route('horarios.index')
            ->with('success', 'Horario programado correctamente.');
    }

    public function show(Horario $horario)
    {
        $horario->load(['curso.docente', 'aula', 'detallesMatricula.matricula.estudiante']);
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        $cursos = Curso::orderBy('nombre')->get();
        $aulas = Aula::orderBy('nombre')->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        return view('horarios.edit', compact('horario', 'cursos', 'aulas', 'dias'));
    }

    public function update(Request $request, Horario $horario)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // Validar cruce de aula excluyendo el actual
        $cruceAula = Horario::where('aula_id', $validated['aula_id'])
            ->where('dia', $validated['dia'])
            ->where('id', '!=', $horario->id)
            ->where(function ($query) use ($validated) {
                $query->where('hora_inicio', '<', $validated['hora_fin'])
                      ->where('hora_fin', '>', $validated['hora_inicio']);
            })
            ->exists();

        if ($cruceAula) {
            return back()->withInput()->withErrors([
                'aula_id' => 'El aula seleccionada ya está ocupada en ese día y rango horario.',
            ]);
        }

        $horario->update($validated);

        return redirect()->route('horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario)
    {
        if ($horario->detallesMatricula()->exists()) {
            return back()->with('error', 'No se puede eliminar el horario porque tiene estudiantes matriculados.');
        }

        $horario->delete();

        return redirect()->route('horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}
