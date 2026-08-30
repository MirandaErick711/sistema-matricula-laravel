<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Docente;

class DocenteSeeder extends Seeder
{
    public function run(): void
    {
        Docente::create([
            'nombres' => 'Juan Carlos',
            'apellidos' => 'Pérez Torres',
        ]);

        Docente::create([
            'nombres' => 'María Elena',
            'apellidos' => 'López García',
        ]);

        Docente::create([
            'nombres' => 'Carlos Alberto',
            'apellidos' => 'Ramírez Díaz',
        ]);

        Docente::create([
            'nombres' => 'Ana María',
            'apellidos' => 'Torres Sánchez',
        ]);

        Docente::create([
            'nombres' => 'Luis Fernando',
            'apellidos' => 'Vega Castro',
        ]);
    }
}