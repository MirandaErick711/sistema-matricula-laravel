<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Carrera;
use App\Models\Curso;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $stats = [
            'total_estudiantes' => Estudiante::count(),
            'total_docentes' => Docente::count(),
            'total_cursos' => Curso::count(),
            'total_carreras' => Carrera::count(),
            'total_aulas' => Aula::count(),
            'total_horarios' => Horario::count(),
            'total_matriculas' => Matricula::count(),
        ];

        $ultimasMatriculas = Matricula::with(['estudiante.carrera'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', [
            'stats' => $stats,
            'ultimasMatriculas' => $ultimasMatriculas,
        ]);
    }
}
