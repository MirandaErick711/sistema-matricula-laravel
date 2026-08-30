<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CarreraSeeder::class,
            SemestreAcademicoSeeder::class,
            AulaSeeder::class,
            DocenteSeeder::class,
            CursoSeeder::class,
            CarreraCursoSeeder::class,
            PrerequisitoSeeder::class,
            EstudianteSeeder::class,
            GrupoSeeder::class,
            HorarioSeeder::class,
            MatriculaSeeder::class,
            DetalleMatriculaSeeder::class,
        ]);
    }
}
