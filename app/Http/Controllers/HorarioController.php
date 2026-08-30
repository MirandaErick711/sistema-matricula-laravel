<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with([
            'grupo.curso',
            'grupo.aula',
            'grupo.semestre'
        ])
        ->orderBy('dia')
        ->orderBy('hora_inicio')
        ->paginate(15);

        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $grupos = Grupo::with([
            'curso',
            'semestre'
        ])
        ->orderBy('id')
        ->get();

        return view('horarios.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        Horario::create($validated);

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario registrado correctamente.');
    }

    public function show(Horario $horario)
    {
        $horario->load([
            'grupo.curso',
            'grupo.aula',
            'grupo.semestre'
        ]);

        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        $grupos = Grupo::with([
            'curso',
            'semestre'
        ])
        ->orderBy('id')
        ->get();

        return view(
            'horarios.edit',
            compact('horario', 'grupos')
        );
    }

    public function update(Request $request, Horario $horario)
    {
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'dia' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);

        $horario->update($validated);

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario actualizado correctamente.');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()
            ->route('horarios.index')
            ->with('success', 'Horario eliminado correctamente.');
    }
}