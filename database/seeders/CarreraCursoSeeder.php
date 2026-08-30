<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraCursoSeeder extends Seeder
{
    public function run(): void
    {
        // Ingeniería de Sistemas e Informática
        DB::table('carrera_curso')->insert([
            [
                'carrera_id' => 1,
                'curso_id' => 1,
            ],
            [
                'carrera_id' => 1,
                'curso_id' => 2,
            ],
            [
                'carrera_id' => 1,
                'curso_id' => 3,
            ],
            [
                'carrera_id' => 1,
                'curso_id' => 4,
            ],
            [
                'carrera_id' => 1,
                'curso_id' => 5,
            ],
        ]);

        // Ingeniería Civil
        DB::table('carrera_curso')->insert([
            [
                'carrera_id' => 2,
                'curso_id' => 5,
            ],
            [
                'carrera_id' => 2,
                'curso_id' => 6,
            ],
        ]);

        // Ingeniería Mecánica
        DB::table('carrera_curso')->insert([
            [
                'carrera_id' => 3,
                'curso_id' => 5,
            ],
            [
                'carrera_id' => 3,
                'curso_id' => 6,
            ],
        ]);
    }
}