<?php

namespace Database\Seeders;

use App\Models\Aula;
use App\Models\Carrera;
use App\Models\Curso;
use App\Models\DetalleMatricula;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Matricula;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Carreras
        $carreras = [
            Carrera::create(['nombre' => 'Ingeniería de Sistemas e Informática']),
            Carrera::create(['nombre' => 'Ingeniería Civil']),
            Carrera::create(['nombre' => 'Medicina Humana']),
            Carrera::create(['nombre' => 'Administración de Empresas']),
            Carrera::create(['nombre' => 'Enfermería']),
        ];

        // 2. Docentes
        $docentes = [
            Docente::create(['nombres' => 'Carlos', 'apellidos' => 'Mendoza Ruiz', 'email' => 'carlos.mendoza@uns.edu.pe']),
            Docente::create(['nombres' => 'Elena', 'apellidos' => 'Paredes Valdivia', 'email' => 'elena.paredes@uns.edu.pe']),
            Docente::create(['nombres' => 'Jorge', 'apellidos' => 'Benites Morales', 'email' => 'jorge.benites@uns.edu.pe']),
            Docente::create(['nombres' => 'Rosa', 'apellidos' => 'Vásquez Castro', 'email' => 'rosa.vasquez@uns.edu.pe']),
            Docente::create(['nombres' => 'Walter', 'apellidos' => 'Salazar Gómez', 'email' => 'walter.salazar@uns.edu.pe']),
        ];

        // 3. Aulas
        $aulas = [
            Aula::create(['nombre' => 'Aula 101 - Pabellón A', 'capacidad' => 35]),
            Aula::create(['nombre' => 'Aula 102 - Pabellón A', 'capacidad' => 30]),
            Aula::create(['nombre' => 'Lab. Cómputo 1 - Sistemas', 'capacidad' => 25]),
            Aula::create(['nombre' => 'Lab. Cómputo 2 - Sistemas', 'capacidad' => 25]),
            Aula::create(['nombre' => 'Auditorio Central', 'capacidad' => 80]),
        ];

        // 4. Cursos
        $cursos = [
            Curso::create(['codigo' => 'SIS-101', 'nombre' => 'Algoritmos y Estructura de Datos', 'creditos' => 4, 'docente_id' => $docentes[0]->id]),
            Curso::create(['codigo' => 'SIS-102', 'nombre' => 'Base de Datos I', 'creditos' => 4, 'docente_id' => $docentes[2]->id]),
            Curso::create(['codigo' => 'SIS-103', 'nombre' => 'Ingeniería de Software I', 'creditos' => 3, 'docente_id' => $docentes[4]->id]),
            Curso::create(['codigo' => 'MAT-101', 'nombre' => 'Cálculo Diferencial', 'creditos' => 4, 'docente_id' => $docentes[1]->id]),
            Curso::create(['codigo' => 'ADM-101', 'nombre' => 'Gestión y Administración General', 'creditos' => 3, 'docente_id' => $docentes[3]->id]),
        ];

        // 5. Horarios
        $horarios = [
            Horario::create(['curso_id' => $cursos[0]->id, 'aula_id' => $aulas[2]->id, 'dia' => 'Lunes', 'hora_inicio' => '08:00', 'hora_fin' => '10:00']),
            Horario::create(['curso_id' => $cursos[0]->id, 'aula_id' => $aulas[0]->id, 'dia' => 'Miércoles', 'hora_inicio' => '08:00', 'hora_fin' => '10:00']),
            Horario::create(['curso_id' => $cursos[1]->id, 'aula_id' => $aulas[3]->id, 'dia' => 'Martes', 'hora_inicio' => '10:00', 'hora_fin' => '12:00']),
            Horario::create(['curso_id' => $cursos[2]->id, 'aula_id' => $aulas[1]->id, 'dia' => 'Jueves', 'hora_inicio' => '14:00', 'hora_fin' => '16:00']),
            Horario::create(['curso_id' => $cursos[3]->id, 'aula_id' => $aulas[0]->id, 'dia' => 'Viernes', 'hora_inicio' => '08:00', 'hora_fin' => '10:00']),
            Horario::create(['curso_id' => $cursos[4]->id, 'aula_id' => $aulas[1]->id, 'dia' => 'Miércoles', 'hora_inicio' => '14:00', 'hora_fin' => '16:00']),
        ];

        // 6. Estudiantes
        $estudiantes = [
            Estudiante::create(['nombres' => 'Juan', 'apellidos' => 'Pérez Rodríguez', 'dni' => '71234567', 'email' => 'juan.perez@uns.edu.pe', 'carrera_id' => $carreras[0]->id]),
            Estudiante::create(['nombres' => 'María', 'apellidos' => 'Gómez Flores', 'dni' => '72345678', 'email' => 'maria.gomez@uns.edu.pe', 'carrera_id' => $carreras[0]->id]),
            Estudiante::create(['nombres' => 'Pedro', 'apellidos' => 'Alva Castillo', 'dni' => '73456789', 'email' => 'pedro.alva@uns.edu.pe', 'carrera_id' => $carreras[1]->id]),
            Estudiante::create(['nombres' => 'Lucía', 'apellidos' => 'Torres Morales', 'dni' => '74567890', 'email' => 'lucia.torres@uns.edu.pe', 'carrera_id' => $carreras[2]->id]),
            Estudiante::create(['nombres' => 'Diego', 'apellidos' => 'Ramos Sánchez', 'dni' => '75678901', 'email' => 'diego.ramos@uns.edu.pe', 'carrera_id' => $carreras[3]->id]),
        ];

        // 7. Matrículas
        $m1 = Matricula::create([
            'estudiante_id' => $estudiantes[0]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-01',
            'estado' => 'Activa',
        ]);
        $m2 = Matricula::create([
            'estudiante_id' => $estudiantes[1]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-02',
            'estado' => 'Activa',
        ]);
        $m3 = Matricula::create([
            'estudiante_id' => $estudiantes[4]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-03',
            'estado' => 'Activa',
        ]);

        // 8. Detalle Matrícula
        DetalleMatricula::create(['matricula_id' => $m1->id, 'horario_id' => $horarios[0]->id, 'nota' => null]);
        DetalleMatricula::create(['matricula_id' => $m1->id, 'horario_id' => $horarios[2]->id, 'nota' => null]);

        DetalleMatricula::create(['matricula_id' => $m2->id, 'horario_id' => $horarios[0]->id, 'nota' => null]);
        DetalleMatricula::create(['matricula_id' => $m2->id, 'horario_id' => $horarios[3]->id, 'nota' => null]);

        DetalleMatricula::create(['matricula_id' => $m3->id, 'horario_id' => $horarios[5]->id, 'nota' => null]);
    }
}
