<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        Carrera::create([
            'nombre' => 'Ingeniería de Sistemas e Informática',
        ]);

        Carrera::create([
            'nombre' => 'Ingeniería Civil',
        ]);

        Carrera::create([
            'nombre' => 'Ingeniería Mecánica',
        ]);
    }
}