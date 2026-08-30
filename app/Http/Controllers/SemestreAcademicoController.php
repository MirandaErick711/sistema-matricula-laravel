<?php

namespace App\Http\Controllers;

use App\Models\SemestreAcademico;
use Illuminate\Http\Request;

class SemestreAcademicoController extends Controller
{
    public function index()
    {
        $semestres = SemestreAcademico::latest()->paginate(10);

        return view(
            'semestres_academicos.index',
            compact('semestres')
        );
    }

    public function create()
    {
        return view('semestres_academicos.create');
    }

    public function matriculas()
    {
        return $this->hasMany(
            Matricula::class,
            'semestre_id'
        );
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:20|unique:semestres_academicos,nombre',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        SemestreAcademico::create($validated);

        return redirect()
            ->route('semestres-academicos.index')
            ->with('success', 'Semestre académico creado correctamente.');
    }

    public function show(SemestreAcademico $semestreAcademico)
    {
        $semestreAcademico->load([
            'grupos',
            'matriculas'
        ]);

        return view(
            'semestres_academicos.show',
            compact('semestreAcademico')
        );
    }

    public function edit(SemestreAcademico $semestreAcademico)
    {
        return view(
            'semestres_academicos.edit',
            compact('semestreAcademico')
        );
    }

    public function update(
        Request $request,
        SemestreAcademico $semestreAcademico
    ) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:20|unique:semestres_academicos,nombre,' . $semestreAcademico->id,
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $semestreAcademico->update($validated);

        return redirect()
            ->route('semestres-academicos.index')
            ->with('success', 'Semestre académico actualizado correctamente.');
    }

    public function destroy(SemestreAcademico $semestreAcademico)
    {
        $semestreAcademico->delete();

        return redirect()
            ->route('semestres-academicos.index')
            ->with('success', 'Semestre académico eliminado correctamente.');
    }
}