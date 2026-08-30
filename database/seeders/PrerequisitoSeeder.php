<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrerequisitoSeeder extends Seeder
{
    public function run(): void
    {
        // Base de Datos II requiere Base de Datos I
        DB::table('prerrequisitos')->insert([
            'curso_id' => 3,
            'prerrequisito_id' => 2,
        ]);

        // Ingeniería de Software I requiere Programación I
        DB::table('prerrequisitos')->insert([
            'curso_id' => 4,
            'prerrequisito_id' => 1,
        ]);
    }
}