<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function create()
    {
        return view('cursos.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|max:20',
            'nombre' => 'required',
            'horas_teoria' => 'required|integer|min:0',
            'horas_practica' => 'required|integer|min:0',
            'docente' => 'required',
            'aula' => 'required|max:20',
            'creditos' => 'required|integer|min:0',
        ]);

        $curso = Curso::create($request->all());

        return view('cursos.confirmacion', compact('curso'));
    }
}