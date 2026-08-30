<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matricula;

class MatriculaSeeder extends Seeder
{
    public function run(): void
    {
        Matricula::create([
            'estudiante_id' => 1,
            'semestre_id' => 2,
            'fecha_matricula' => '2026-08-30',
            'estado' => 'Activa',
        ]);

        Matricula::create([
            'estudiante_id' => 2,
            'semestre_id' => 2,
            'fecha_matricula' => '2026-08-30',
            'estado' => 'Activa',
        ]);

        Matricula::create([
            'estudiante_id' => 3,
            'semestre_id' => 2,
            'fecha_matricula' => '2026-08-30',
            'estado' => 'Activa',
        ]);
    }
}