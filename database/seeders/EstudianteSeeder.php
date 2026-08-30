<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        Estudiante::create([
            'nombres' => 'Erick Rodrigo',
            'apellidos' => 'Miranda Vega',
            'dni' => '70000001',
            'carrera_id' => 1,
        ]);

        Estudiante::create([
            'nombres' => 'Ana María',
            'apellidos' => 'García Torres',
            'dni' => '70000002',
            'carrera_id' => 1,
        ]);

        Estudiante::create([
            'nombres' => 'Carlos Alberto',
            'apellidos' => 'López Pérez',
            'dni' => '70000003',
            'carrera_id' => 2,
        ]);
    }
}