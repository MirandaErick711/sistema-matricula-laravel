<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Matricula;
use App\Models\SemestreAcademico;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with([
            'estudiante',
            'semestre'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'matriculas.index',
            compact('matriculas')
        );
    }

    public function create()
    {
        $estudiantes = Estudiante::orderBy(
            'apellidos'
        )->get();

        $semestres = SemestreAcademico::orderByDesc(
            'fecha_inicio'
        )->get();

        return view(
            'matriculas.create',
            compact(
                'estudiantes',
                'semestres'
            )
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'estudiante_id' => [
                'required',
                'exists:estudiantes,id'
            ],

            'semestre_id' => [
                'required',
                'exists:semestres_academicos,id'
            ],

            'fecha_matricula' => [
                'required',
                'date'
            ],

            'estado' => [
                'required',
                'in:Activa,Anulada,Finalizada'
            ],
        ]);

        $existe = Matricula::where(
            'estudiante_id',
            $validated['estudiante_id']
        )
        ->where(
            'semestre_id',
            $validated['semestre_id']
        )
        ->exists();

        if ($existe) {
            return back()
                ->withErrors([
                    'estudiante_id' =>
                        'El estudiante ya tiene una matrícula en este semestre.'
                ])
                ->withInput();
        }

        Matricula::create($validated);

        return redirect()
            ->route('matriculas.index')
            ->with(
                'success',
                'Matrícula creada correctamente.'
            );
    }

    public function show(Matricula $matricula)
    {
        $matricula->load([
            'estudiante',
            'semestre',
            'detalles.grupo.curso',
            'detalles.grupo.docente',
            'detalles.grupo.aula',
        ]);

        return view(
            'matriculas.show',
            compact('matricula')
        );
    }

    public function edit(Matricula $matricula)
    {
        $estudiantes = Estudiante::orderBy(
            'apellidos'
        )->get();

        $semestres = SemestreAcademico::orderByDesc(
            'fecha_inicio'
        )->get();

        return view(
            'matriculas.edit',
            compact(
                'matricula',
                'estudiantes',
                'semestres'
            )
        );
    }

    public function update(
        Request $request,
        Matricula $matricula
    ) {
        $validated = $request->validate([
            'estudiante_id' => [
                'required',
                'exists:estudiantes,id'
            ],

            'semestre_id' => [
                'required',
                'exists:semestres_academicos,id'
            ],

            'fecha_matricula' => [
                'required',
                'date'
            ],

            'estado' => [
                'required',
                'in:Activa,Anulada,Finalizada'
            ],
        ]);

        $existe = Matricula::where(
            'estudiante_id',
            $validated['estudiante_id']
        )
        ->where(
            'semestre_id',
            $validated['semestre_id']
        )
        ->where(
            'id',
            '!=',
            $matricula->id
        )
        ->exists();

        if ($existe) {
            return back()
                ->withErrors([
                    'estudiante_id' =>
                        'El estudiante ya tiene otra matrícula en este semestre.'
                ])
                ->withInput();
        }

        $matricula->update($validated);

        return redirect()
            ->route('matriculas.index')
            ->with(
                'success',
                'Matrícula actualizada correctamente.'
            );
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect()
            ->route('matriculas.index')
            ->with(
                'success',
                'Matrícula eliminada correctamente.'
            );
    }
}