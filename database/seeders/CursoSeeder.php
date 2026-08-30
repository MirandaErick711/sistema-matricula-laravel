<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        Curso::create([
            'nombre' => 'Programación I',
            'creditos' => 4,
        ]);

        Curso::create([
            'nombre' => 'Base de Datos I',
            'creditos' => 4,
        ]);

        Curso::create([
            'nombre' => 'Base de Datos II',
            'creditos' => 4,
        ]);

        Curso::create([
            'nombre' => 'Ingeniería de Software I',
            'creditos' => 3,
        ]);

        Curso::create([
            'nombre' => 'Matemática I',
            'creditos' => 4,
        ]);

        Curso::create([
            'nombre' => 'Física I',
            'creditos' => 4,
        ]);
    }
}