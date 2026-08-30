<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Base de Datos I - 2026-II
        |--------------------------------------------------------------------------
        */

        // Teoría 1
        Grupo::create([
            'curso_id' => 2,
            'semestre_id' => 2,
            'docente_id' => 2,
            'aula_id' => 1,
            'nombre' => 'T1',
            'tipo' => 'Teoria',
            'capacidad' => 30,
        ]);

        // Teoría 2
        Grupo::create([
            'curso_id' => 2,
            'semestre_id' => 2,
            'docente_id' => 3,
            'aula_id' => 2,
            'nombre' => 'T2',
            'tipo' => 'Teoria',
            'capacidad' => 25,
        ]);

        // Práctica 1
        Grupo::create([
            'curso_id' => 2,
            'semestre_id' => 2,
            'docente_id' => 4,
            'aula_id' => 4,
            'nombre' => 'P1',
            'tipo' => 'Practica',
            'capacidad' => 25,
        ]);

        // Práctica 2
        Grupo::create([
            'curso_id' => 2,
            'semestre_id' => 2,
            'docente_id' => 5,
            'aula_id' => 5,
            'nombre' => 'P2',
            'tipo' => 'Practica',
            'capacidad' => 20,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Programación I - 2026-II
        |--------------------------------------------------------------------------
        */

        Grupo::create([
            'curso_id' => 1,
            'semestre_id' => 2,
            'docente_id' => 1,
            'aula_id' => 3,
            'nombre' => 'T1',
            'tipo' => 'Teoria',
            'capacidad' => 40,
        ]);

        Grupo::create([
            'curso_id' => 1,
            'semestre_id' => 2,
            'docente_id' => 2,
            'aula_id' => 4,
            'nombre' => 'P1',
            'tipo' => 'Practica',
            'capacidad' => 25,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Base de Datos II - 2026-II
        |--------------------------------------------------------------------------
        */

        Grupo::create([
            'curso_id' => 3,
            'semestre_id' => 2,
            'docente_id' => 3,
            'aula_id' => 1,
            'nombre' => 'T1',
            'tipo' => 'Teoria',
            'capacidad' => 30,
        ]);

        Grupo::create([
            'curso_id' => 3,
            'semestre_id' => 2,
            'docente_id' => 4,
            'aula_id' => 4,
            'nombre' => 'P1',
            'tipo' => 'Practica',
            'capacidad' => 25,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ingeniería de Software I - 2026-II
        |--------------------------------------------------------------------------
        */

        Grupo::create([
            'curso_id' => 4,
            'semestre_id' => 2,
            'docente_id' => 5,
            'aula_id' => 2,
            'nombre' => 'T1',
            'tipo' => 'Teoria',
            'capacidad' => 25,
        ]);

        Grupo::create([
            'curso_id' => 4,
            'semestre_id' => 2,
            'docente_id' => 1,
            'aula_id' => 5,
            'nombre' => 'P1',
            'tipo' => 'Practica',
            'capacidad' => 20,
        ]);
    }
}