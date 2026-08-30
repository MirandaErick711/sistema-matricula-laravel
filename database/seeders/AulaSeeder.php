<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    public function run(): void
    {
        Aula::create([
            'nombre' => 'Aula 101',
            'capacidad' => 30,
        ]);

        Aula::create([
            'nombre' => 'Aula 102',
            'capacidad' => 25,
        ]);

        Aula::create([
            'nombre' => 'Aula 201',
            'capacidad' => 40,
        ]);

        Aula::create([
            'nombre' => 'Laboratorio 1',
            'capacidad' => 25,
        ]);

        Aula::create([
            'nombre' => 'Laboratorio 2',
            'capacidad' => 20,
        ]);
    }
}