<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Horario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HorarioController extends Controller
{
    public function index(Request $request): View
    {
        $aulas = Aula::orderBy('nombre')->get();
        $docentes = Docente::all();

        $modoCalendario = $request->filled('aula_id') || $request->filled('docente_id');

        $query = Horario::with(['curso.docente', 'aula']);

        if ($modoCalendario) {
            if ($request->filled('aula_id')) {
                $query->where('aula_id', $request->aula_id);
            } elseif ($request->filled('docente_id')) {
                $query->whereHas('curso', function ($q) use ($request) {
                    $q->where('docente_id', $request->docente_id);
                });
            }

            $horarios = $query->orderByRaw("CASE dia WHEN 'Lunes' THEN 1 WHEN 'Martes' THEN 2 WHEN 'Miércoles' THEN 3 WHEN 'Jueves' THEN 4 WHEN 'Viernes' THEN 5 WHEN 'Sábado' THEN 6 ELSE 7 END")
                ->orderBy('hora_inicio')
                ->get();
        } else {
            $horarios = $query->paginate(10);
        }

        return view('horarios.index', compact('horarios', 'aulas', 'docentes', 'modoCalendario'));
    }

    public function create(): View
    {
        $cursos = Curso::orderBy('nombre')->get();
        $aulas = Aula::orderBy('nombre')->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        return view('horarios.create', compact('cursos', 'aulas', 'dias'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // 1. Validar cruce de AULA
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

        // 2. Validar cruce de DOCENTE
        // Primero, obtenemos quién es el docente del curso que intentan registrar
        $cursoSeleccionado = Curso::findOrFail($validated['curso_id']);

        $cruceDocente = Horario::whereHas('curso', function ($query) use ($cursoSeleccionado) {
                $query->where('docente_id', $cursoSeleccionado->docente_id);
            })
            ->where('dia', $validated['dia'])
            ->where(function ($query) use ($validated) {
                $query->where('hora_inicio', '<', $validated['hora_fin'])
                      ->where('hora_fin', '>', $validated['hora_inicio']);
            })
            ->exists();

        if ($cruceDocente) {
            return back()->withInput()->withErrors([
                'curso_id' => 'El docente de este curso ya tiene otra clase asignada en ese día y horario.',
            ]);
        }

        // Si pasa ambas validaciones, se guarda
        Horario::create($validated);

        return redirect()->route('horarios.index')
            ->with('success', 'Horario programado correctamente.');
    }

    public function show(Horario $horario): View
    {
        $horario->load(['curso.docente', 'aula', 'detallesMatricula.matricula.estudiante']);
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario): View
    {
        $cursos = Curso::orderBy('nombre')->get();
        $aulas = Aula::orderBy('nombre')->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

        return view('horarios.edit', compact('horario', 'cursos', 'aulas', 'dias'));
    }

    public function update(Request $request, Horario $horario): RedirectResponse
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|string|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        // 1. Validar cruce de AULA excluyendo el actual
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

        // 2. Validar cruce de DOCENTE excluyendo el actual
        $cursoSeleccionado = Curso::findOrFail($validated['curso_id']);
        
        $cruceDocente = Horario::whereHas('curso', function ($query) use ($cursoSeleccionado) {
                $query->where('docente_id', $cursoSeleccionado->docente_id);
            })
            ->where('dia', $validated['dia'])
            ->where('id', '!=', $horario->id)
            ->where(function ($query) use ($validated) {
                $query->where('hora_inicio', '<', $validated['hora_fin'])
                      ->where('hora_fin', '>', $validated['hora_inicio']);
            })
            ->exists();

        if ($cruceDocente) {
            return back()->withInput()->withErrors([
                'curso_id' => 'El docente asignado a este curso ya tiene otra clase programada en ese día y rango horario.',
            ]);
        }

        // 3. Si todo está libre, procedemos a actualizar
        $horario->update($validated);

        return redirect()->route('horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario): RedirectResponse
    {
        if ($horario->detallesMatricula()->exists()) {
            return back()->with('error', 'No se puede eliminar el horario porque tiene estudiantes matriculados.');
        }

        $horario->delete();

        return redirect()->route('horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}
