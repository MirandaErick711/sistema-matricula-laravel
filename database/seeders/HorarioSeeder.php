<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Horario;

class HorarioSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Base de Datos I
        |--------------------------------------------------------------------------
        */

        // Grupo 1 - Teoría
        Horario::create([
            'grupo_id' => 1,
            'dia' => 'Lunes',
            'hora_inicio' => '08:00',
            'hora_fin' => '10:00',
        ]);

        // Grupo 2 - Teoría
        Horario::create([
            'grupo_id' => 2,
            'dia' => 'Lunes',
            'hora_inicio' => '10:00',
            'hora_fin' => '12:00',
        ]);

        // Grupo 1 - Práctica
        Horario::create([
            'grupo_id' => 3,
            'dia' => 'Martes',
            'hora_inicio' => '08:00',
            'hora_fin' => '10:00',
        ]);

        // Grupo 2 - Práctica
        Horario::create([
            'grupo_id' => 4,
            'dia' => 'Martes',
            'hora_inicio' => '10:00',
            'hora_fin' => '12:00',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Programación I
        |--------------------------------------------------------------------------
        */

        // Teoría
        Horario::create([
            'grupo_id' => 5,
            'dia' => 'Miércoles',
            'hora_inicio' => '08:00',
            'hora_fin' => '10:00',
        ]);

        // Práctica
        Horario::create([
            'grupo_id' => 6,
            'dia' => 'Miércoles',
            'hora_inicio' => '10:00',
            'hora_fin' => '12:00',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Base de Datos II
        |--------------------------------------------------------------------------
        */

        // Teoría
        Horario::create([
            'grupo_id' => 7,
            'dia' => 'Jueves',
            'hora_inicio' => '08:00',
            'hora_fin' => '10:00',
        ]);

        // Práctica
        Horario::create([
            'grupo_id' => 8,
            'dia' => 'Jueves',
            'hora_inicio' => '10:00',
            'hora_fin' => '12:00',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ingeniería de Software I
        |--------------------------------------------------------------------------
        */

        // Teoría
        Horario::create([
            'grupo_id' => 9,
            'dia' => 'Viernes',
            'hora_inicio' => '08:00',
            'hora_fin' => '10:00',
        ]);

        // Práctica
        Horario::create([
            'grupo_id' => 10,
            'dia' => 'Viernes',
            'hora_inicio' => '10:00',
            'hora_fin' => '12:00',
        ]);
    }
}