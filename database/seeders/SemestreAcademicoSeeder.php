<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SemestreAcademico;

class SemestreAcademicoSeeder extends Seeder
{
    public function run(): void
    {
        SemestreAcademico::create([
            'nombre' => '2026-I',
            'fecha_inicio' => '2026-04-01',
            'fecha_fin' => '2026-07-31',
        ]);

        SemestreAcademico::create([
            'nombre' => '2026-II',
            'fecha_inicio' => '2026-08-17',
            'fecha_fin' => '2026-12-19',
        ]);
    }
}