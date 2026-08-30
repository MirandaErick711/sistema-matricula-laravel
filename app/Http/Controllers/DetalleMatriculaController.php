<?php

namespace App\Http\Controllers;

use App\Models\DetalleMatricula;
use App\Models\Grupo;
use App\Models\Matricula;
use Illuminate\Http\Request;

class DetalleMatriculaController extends Controller
{
    public function create(Matricula $matricula)
    {
        $matricula->load([
            'estudiante.carrera',
            'semestre',
            'detalles.grupo.curso',
        ]);

        $grupos = Grupo::with([
            'curso',
            'docente',
            'aula',
            'horarios',
        ])
        ->where(
            'semestre_id',
            $matricula->semestre_id
        )
        ->orderBy('curso_id')
        ->get();

        return view(
            'detalle_matricula.create',
            compact(
                'matricula',
                'grupos'
            )
        );
    }

    public function store(
    Request $request,
    Matricula $matricula
    ) {
        if ($matricula->estado !== 'Activa') {
    return back()->withErrors([
            'grupo_id' => 'No se pueden agregar cursos a una matrícula que no está activa.'
        ]);
    }

        $validated = $request->validate([
            'grupo_id' => [
                'required',
                'exists:grupos,id'
            ],
        ]);

        $grupo = Grupo::with([
            'curso',
            'horarios'
        ])->findOrFail(
            $validated['grupo_id']
        );

        /*
        |--------------------------------------------------------------------------
        | 1. Verificar semestre
        |--------------------------------------------------------------------------
        */

        if (
            $grupo->semestre_id
            != $matricula->semestre_id
        ) {
            return back()
                ->withErrors([
                    'grupo_id' =>
                        'El grupo no pertenece al semestre de la matrícula.'
                ])
                ->withInput();
        }

        $matricula->load('estudiante.carrera');

        $perteneceACarrera = $matricula
            ->estudiante
            ->carrera
            ->cursos()
            ->where('cursos.id', $grupo->curso_id)
            ->exists();

        if (!$perteneceACarrera) {
            return back()
                ->withErrors([
                    'grupo_id' =>
                        'El curso no pertenece a la carrera del estudiante.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Verificar que no tenga el mismo grupo
        |--------------------------------------------------------------------------
        */

        $yaExiste = DetalleMatricula::where(
            'matricula_id',
            $matricula->id
        )
        ->where(
            'grupo_id',
            $grupo->id
        )
        ->exists();

        if ($yaExiste) {
            return back()
                ->withErrors([
                    'grupo_id' =>
                        'Este grupo ya está registrado en la matrícula.'
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Verificar teoría/práctica del mismo curso
        |--------------------------------------------------------------------------
        */

        $mismoCursoYTipo = DetalleMatricula::where(
            'matricula_id',
            $matricula->id
        )
        ->whereHas('grupo', function ($query) use ($grupo) {
            $query
                ->where('curso_id', $grupo->curso_id)
                ->where('tipo', $grupo->tipo);
        })
        ->exists();

        if ($mismoCursoYTipo) {

            $tipo = $grupo->tipo === 'Teoria'
                ? 'teoría'
                : 'práctica';

            return back()
                ->withErrors([
                    'grupo_id' =>
                        "Ya tienes un grupo de {$tipo} para este curso."
                ])
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Verificar capacidad
        |--------------------------------------------------------------------------
        */

        $matriculados = DetalleMatricula::where(
            'grupo_id',
            $grupo->id
        )->count();

        if (
            $matriculados >= $grupo->capacidad
        ) {
            return back()
                ->withErrors([
                    'grupo_id' =>
                        'El grupo ya alcanzó su capacidad máxima.'
                ])
                ->withInput();
        }

    // Verificar cruces de horarios

    $horariosNuevos = $grupo->horarios;

    $gruposMatriculados = $matricula->detalles()
        ->with('grupo.horarios')
        ->get()
        ->pluck('grupo');

    foreach ($horariosNuevos as $horarioNuevo) {

        foreach ($gruposMatriculados as $grupoExistente) {

            foreach ($grupoExistente->horarios as $horarioExistente) {

                if ($horarioNuevo->dia !== $horarioExistente->dia) {
                    continue;
                }

                if (
                    $horarioNuevo->hora_inicio < $horarioExistente->hora_fin &&
                    $horarioNuevo->hora_fin > $horarioExistente->hora_inicio
                ) {
                    return back()
                        ->withErrors([
                            'grupo_id' =>
                                'El grupo seleccionado tiene un cruce de horario con otro grupo de la matrícula.'
                        ])
                        ->withInput();
                }
            }
        }
    }

        /*
        |--------------------------------------------------------------------------
        | 5. Crear detalle
        |--------------------------------------------------------------------------
        */

        DetalleMatricula::create([
            'matricula_id' => $matricula->id,
            'grupo_id' => $grupo->id,
        ]);

        return redirect()
            ->route(
                'matriculas.show',
                $matricula
            )
            ->with(
                'success',
                'Grupo agregado a la matrícula.'
            );
    }

    public function destroy(
        Matricula $matricula,
        DetalleMatricula $detalle
    ) {
        if (
            $detalle->matricula_id
            != $matricula->id
        ) {
            abort(404);
        }

        $detalle->delete();

        return redirect()
            ->route(
                'matriculas.show',
                $matricula
            )
            ->with(
                'success',
                'Grupo retirado de la matrícula.'
            );
    }
}