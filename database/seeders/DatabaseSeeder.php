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
        /*
        |--------------------------------------------------------------------------
        | 1. CARRERAS
        |--------------------------------------------------------------------------
        | Carreras inspiradas en la oferta académica de la UNS.
        */

        $carreras = [
            Carrera::create([
                'nombre' => 'Ingeniería de Sistemas e Informática',
            ]),

            Carrera::create([
                'nombre' => 'Ingeniería Civil',
            ]),

            Carrera::create([
                'nombre' => 'Ingeniería en Energía',
            ]),

            Carrera::create([
                'nombre' => 'Ingeniería Agroindustrial',
            ]),

            Carrera::create([
                'nombre' => 'Ingeniería Mecánica',
            ]),

            Carrera::create([
                'nombre' => 'Ingeniería Agrónoma',
            ]),

            Carrera::create([
                'nombre' => 'Medicina Humana',
            ]),

            Carrera::create([
                'nombre' => 'Enfermería',
            ]),

            Carrera::create([
                'nombre' => 'Biotecnología',
            ]),

            Carrera::create([
                'nombre' => 'Biología en Acuicultura',
            ]),
        ];


        /*
        |--------------------------------------------------------------------------
        | 2. DOCENTES
        |--------------------------------------------------------------------------
        | Nombres de docentes que aparecen en fuentes públicas de la UNS.
        |
        | Los correos son ficticios para pruebas del sistema.
        */

        $docentes = [
            Docente::create([
                'nombres' => 'Hugo Esteban',
                'apellidos' => 'Caselli Gismondi',
                'email' => 'hugo.caselli.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Yim Isaias',
                'apellidos' => 'Apestegui Florentino',
                'email' => 'yim.apestegui.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Whiston Kendrick',
                'apellidos' => 'Borja Reyna',
                'email' => 'whiston.borja.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Diana Cecilia',
                'apellidos' => 'Muñoz Casanova',
                'email' => 'diana.munoz.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Lizbeth Dora',
                'apellidos' => 'Briones Pereyra',
                'email' => 'lizbeth.briones.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Walter Jesús',
                'apellidos' => 'Escalante Espinoza',
                'email' => 'walter.escalante.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Carlos Alberto',
                'apellidos' => 'Chávez Monzón',
                'email' => 'carlos.chavez.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Juan Pablo',
                'apellidos' => 'Sánchez',
                'email' => 'juan.sanchez.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Guillermo',
                'apellidos' => 'Gil Albarrán',
                'email' => 'guillermo.gil.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Carlos',
                'apellidos' => 'Guerra Cordero',
                'email' => 'carlos.guerra.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Antonio Manuel',
                'apellidos' => 'Otoya Zelada',
                'email' => 'antonio.otoya.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Edwin Alberto',
                'apellidos' => 'Valencia Castillo',
                'email' => 'edwin.valencia.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Ricardo Darío',
                'apellidos' => 'Mendoza Rivera',
                'email' => 'ricardo.mendoza.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Florentino Yim Isaias',
                'apellidos' => 'Apestegui',
                'email' => 'florentino.apestegui.demo@uns.edu.pe',
            ]),

            Docente::create([
                'nombres' => 'Héctor Domingo',
                'apellidos' => 'Benites Villegas',
                'email' => 'hector.benites.demo@uns.edu.pe',
            ]),
        ];


        /*
        |--------------------------------------------------------------------------
        | 3. AULAS
        |--------------------------------------------------------------------------
        | Aulas y laboratorios ficticios con nomenclatura universitaria.
        */

        $aulas = [
            Aula::create([
                'nombre' => 'Aula A-101',
                'capacidad' => 40,
            ]),

            Aula::create([
                'nombre' => 'Aula A-102',
                'capacidad' => 40,
            ]),

            Aula::create([
                'nombre' => 'Aula A-103',
                'capacidad' => 35,
            ]),

            Aula::create([
                'nombre' => 'Aula B-201',
                'capacidad' => 45,
            ]),

            Aula::create([
                'nombre' => 'Aula B-202',
                'capacidad' => 45,
            ]),

            Aula::create([
                'nombre' => 'Aula B-203',
                'capacidad' => 35,
            ]),

            Aula::create([
                'nombre' => 'Laboratorio de Cómputo 01',
                'capacidad' => 30,
            ]),

            Aula::create([
                'nombre' => 'Laboratorio de Cómputo 02',
                'capacidad' => 30,
            ]),

            Aula::create([
                'nombre' => 'Laboratorio de Redes',
                'capacidad' => 25,
            ]),

            Aula::create([
                'nombre' => 'Laboratorio de Electrónica',
                'capacidad' => 25,
            ]),

            Aula::create([
                'nombre' => 'Laboratorio de Física',
                'capacidad' => 35,
            ]),

            Aula::create([
                'nombre' => 'Auditorio',
                'capacidad' => 100,
            ]),
        ];


        /*
        |--------------------------------------------------------------------------
        | 4. CURSOS
        |--------------------------------------------------------------------------
        | Cursos inspirados principalmente en Ingeniería de Sistemas
        | e Informática y algunos cursos generales.
        */

        $cursos = [

            // I CICLO
            Curso::create([
                'codigo' => 'SIS101',
                'nombre' => 'Introducción a la Ingeniería de Sistemas',
                'creditos' => 3,
                'docente_id' => $docentes[0]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS102',
                'nombre' => 'Metodología de la Programación',
                'creditos' => 4,
                'docente_id' => $docentes[5]->id,
            ]),

            Curso::create([
                'codigo' => 'MAT101',
                'nombre' => 'Matemática I',
                'creditos' => 4,
                'docente_id' => $docentes[9]->id,
            ]),

            // II CICLO
            Curso::create([
                'codigo' => 'SIS201',
                'nombre' => 'Programación I',
                'creditos' => 4,
                'docente_id' => $docentes[6]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS202',
                'nombre' => 'Estructuras de Datos',
                'creditos' => 4,
                'docente_id' => $docentes[1]->id,
            ]),

            Curso::create([
                'codigo' => 'MAT201',
                'nombre' => 'Matemática II',
                'creditos' => 4,
                'docente_id' => $docentes[9]->id,
            ]),

            // III CICLO
            Curso::create([
                'codigo' => 'SIS301',
                'nombre' => 'Base de Datos I',
                'creditos' => 4,
                'docente_id' => $docentes[1]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS302',
                'nombre' => 'Programación II',
                'creditos' => 4,
                'docente_id' => $docentes[2]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS303',
                'nombre' => 'Sistemas Operativos',
                'creditos' => 3,
                'docente_id' => $docentes[5]->id,
            ]),

            // IV CICLO
            Curso::create([
                'codigo' => 'SIS401',
                'nombre' => 'Base de Datos II',
                'creditos' => 4,
                'docente_id' => $docentes[1]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS402',
                'nombre' => 'Ingeniería de Software I',
                'creditos' => 4,
                'docente_id' => $docentes[2]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS403',
                'nombre' => 'Redes de Computadoras',
                'creditos' => 3,
                'docente_id' => $docentes[8]->id,
            ]),

            // V CICLO
            Curso::create([
                'codigo' => 'SIS501',
                'nombre' => 'Investigación de Operaciones I',
                'creditos' => 4,
                'docente_id' => $docentes[6]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS502',
                'nombre' => 'Ingeniería de Software II',
                'creditos' => 4,
                'docente_id' => $docentes[2]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS503',
                'nombre' => 'Sistemas de Información',
                'creditos' => 3,
                'docente_id' => $docentes[0]->id,
            ]),

            // VI CICLO
            Curso::create([
                'codigo' => 'SIS601',
                'nombre' => 'Gestión de Bases de Datos',
                'creditos' => 4,
                'docente_id' => $docentes[1]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS602',
                'nombre' => 'Inteligencia Artificial',
                'creditos' => 4,
                'docente_id' => $docentes[2]->id,
            ]),

            // VII CICLO
            Curso::create([
                'codigo' => 'SIS701',
                'nombre' => 'Gestión de Proyectos de Sistemas',
                'creditos' => 3,
                'docente_id' => $docentes[3]->id,
            ]),

            Curso::create([
                'codigo' => 'SIS702',
                'nombre' => 'Seguridad Informática',
                'creditos' => 3,
                'docente_id' => $docentes[8]->id,
            ]),

            // VIII CICLO
            Curso::create([
                'codigo' => 'SIS801',
                'nombre' => 'Simulación',
                'creditos' => 3,
                'docente_id' => $docentes[0]->id,
            ]),
        ];


        /*
        |--------------------------------------------------------------------------
        | 5. HORARIOS
        |--------------------------------------------------------------------------
        | Horarios variados para permitir probar filtros y conflictos.
        */

        $horarios = [

            // Introducción a Sistemas
            Horario::create([
                'curso_id' => $cursos[0]->id,
                'aula_id' => $aulas[0]->id,
                'dia' => 'Lunes',
                'hora_inicio' => '08:00',
                'hora_fin' => '10:00',
            ]),

            // Metodología de la Programación
            Horario::create([
                'curso_id' => $cursos[1]->id,
                'aula_id' => $aulas[6]->id,
                'dia' => 'Martes',
                'hora_inicio' => '08:00',
                'hora_fin' => '10:00',
            ]),

            // Matemática I
            Horario::create([
                'curso_id' => $cursos[2]->id,
                'aula_id' => $aulas[3]->id,
                'dia' => 'Miércoles',
                'hora_inicio' => '08:00',
                'hora_fin' => '10:00',
            ]),

            // Programación I
            Horario::create([
                'curso_id' => $cursos[3]->id,
                'aula_id' => $aulas[6]->id,
                'dia' => 'Lunes',
                'hora_inicio' => '10:00',
                'hora_fin' => '12:00',
            ]),

            // Estructuras de Datos
            Horario::create([
                'curso_id' => $cursos[4]->id,
                'aula_id' => $aulas[7]->id,
                'dia' => 'Martes',
                'hora_inicio' => '10:00',
                'hora_fin' => '12:00',
            ]),

            // Matemática II
            Horario::create([
                'curso_id' => $cursos[5]->id,
                'aula_id' => $aulas[4]->id,
                'dia' => 'Jueves',
                'hora_inicio' => '08:00',
                'hora_fin' => '10:00',
            ]),

            // Base de Datos I
            Horario::create([
                'curso_id' => $cursos[6]->id,
                'aula_id' => $aulas[7]->id,
                'dia' => 'Miércoles',
                'hora_inicio' => '10:00',
                'hora_fin' => '12:00',
            ]),

            // Programación II
            Horario::create([
                'curso_id' => $cursos[7]->id,
                'aula_id' => $aulas[6]->id,
                'dia' => 'Jueves',
                'hora_inicio' => '10:00',
                'hora_fin' => '12:00',
            ]),

            // Sistemas Operativos
            Horario::create([
                'curso_id' => $cursos[8]->id,
                'aula_id' => $aulas[8]->id,
                'dia' => 'Viernes',
                'hora_inicio' => '08:00',
                'hora_fin' => '10:00',
            ]),

            // Base de Datos II
            Horario::create([
                'curso_id' => $cursos[9]->id,
                'aula_id' => $aulas[7]->id,
                'dia' => 'Lunes',
                'hora_inicio' => '14:00',
                'hora_fin' => '16:00',
            ]),

            // Ingeniería de Software I
            Horario::create([
                'curso_id' => $cursos[10]->id,
                'aula_id' => $aulas[1]->id,
                'dia' => 'Martes',
                'hora_inicio' => '14:00',
                'hora_fin' => '16:00',
            ]),

            // Redes
            Horario::create([
                'curso_id' => $cursos[11]->id,
                'aula_id' => $aulas[8]->id,
                'dia' => 'Miércoles',
                'hora_inicio' => '14:00',
                'hora_fin' => '16:00',
            ]),

            // Investigación de Operaciones
            Horario::create([
                'curso_id' => $cursos[12]->id,
                'aula_id' => $aulas[2]->id,
                'dia' => 'Jueves',
                'hora_inicio' => '14:00',
                'hora_fin' => '16:00',
            ]),

            // Ingeniería de Software II
            Horario::create([
                'curso_id' => $cursos[13]->id,
                'aula_id' => $aulas[4]->id,
                'dia' => 'Viernes',
                'hora_inicio' => '14:00',
                'hora_fin' => '16:00',
            ]),

            // Sistemas de Información
            Horario::create([
                'curso_id' => $cursos[14]->id,
                'aula_id' => $aulas[5]->id,
                'dia' => 'Sábado',
                'hora_inicio' => '08:00',
                'hora_fin' => '11:00',
            ]),

            // Gestión de BD
            Horario::create([
                'curso_id' => $cursos[15]->id,
                'aula_id' => $aulas[7]->id,
                'dia' => 'Lunes',
                'hora_inicio' => '16:00',
                'hora_fin' => '18:00',
            ]),

            // Inteligencia Artificial
            Horario::create([
                'curso_id' => $cursos[16]->id,
                'aula_id' => $aulas[6]->id,
                'dia' => 'Martes',
                'hora_inicio' => '16:00',
                'hora_fin' => '18:00',
            ]),

            // Gestión de Proyectos
            Horario::create([
                'curso_id' => $cursos[17]->id,
                'aula_id' => $aulas[3]->id,
                'dia' => 'Miércoles',
                'hora_inicio' => '16:00',
                'hora_fin' => '18:00',
            ]),

            // Seguridad
            Horario::create([
                'curso_id' => $cursos[18]->id,
                'aula_id' => $aulas[8]->id,
                'dia' => 'Jueves',
                'hora_inicio' => '16:00',
                'hora_fin' => '18:00',
            ]),

            // Simulación
            Horario::create([
                'curso_id' => $cursos[19]->id,
                'aula_id' => $aulas[1]->id,
                'dia' => 'Viernes',
                'hora_inicio' => '16:00',
                'hora_fin' => '18:00',
            ]),
        ];


        /*
        |--------------------------------------------------------------------------
        | 6. ESTUDIANTES
        |--------------------------------------------------------------------------
        | Datos ficticios con DNI peruano de 8 dígitos.
        */

        $estudiantes = [

            // Ingeniería de Sistemas e Informática
            Estudiante::create([
                'nombres' => 'Juan Carlos',
                'apellidos' => 'Pérez Rodríguez',
                'dni' => '71234567',
                'email' => 'juan.perez@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'María Fernanda',
                'apellidos' => 'Gómez Flores',
                'dni' => '72345678',
                'email' => 'maria.gomez@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Diego Alonso',
                'apellidos' => 'Ramos Sánchez',
                'dni' => '73456789',
                'email' => 'diego.ramos@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Lucía Valeria',
                'apellidos' => 'Torres Morales',
                'dni' => '74567890',
                'email' => 'lucia.torres@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Carlos Eduardo',
                'apellidos' => 'Vega Castillo',
                'dni' => '75678901',
                'email' => 'carlos.vega@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Andrea Sofía',
                'apellidos' => 'Mendoza Salazar',
                'dni' => '76789012',
                'email' => 'andrea.mendoza@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'José Miguel',
                'apellidos' => 'Vásquez Herrera',
                'dni' => '77890123',
                'email' => 'jose.vasquez@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Paola Andrea',
                'apellidos' => 'Castro Medina',
                'dni' => '78901234',
                'email' => 'paola.castro@alumno.uns.edu.pe',
                'carrera_id' => $carreras[0]->id,
            ]),

            // Ingeniería Civil
            Estudiante::create([
                'nombres' => 'Pedro Antonio',
                'apellidos' => 'Alva Castillo',
                'dni' => '79012345',
                'email' => 'pedro.alva@alumno.uns.edu.pe',
                'carrera_id' => $carreras[1]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Renato',
                'apellidos' => 'Flores Mendoza',
                'dni' => '70123456',
                'email' => 'renato.flores@alumno.uns.edu.pe',
                'carrera_id' => $carreras[1]->id,
            ]),

            // Ingeniería en Energía
            Estudiante::create([
                'nombres' => 'Miguel Ángel',
                'apellidos' => 'Sánchez Paredes',
                'dni' => '70234567',
                'email' => 'miguel.sanchez@alumno.uns.edu.pe',
                'carrera_id' => $carreras[2]->id,
            ]),

            Estudiante::create([
                'nombres' => 'Daniela',
                'apellidos' => 'Rojas Valdivia',
                'dni' => '70345678',
                'email' => 'daniela.rojas@alumno.uns.edu.pe',
                'carrera_id' => $carreras[2]->id,
            ]),

            // Ingeniería Agroindustrial
            Estudiante::create([
                'nombres' => 'César Augusto',
                'apellidos' => 'Ramírez Torres',
                'dni' => '70456789',
                'email' => 'cesar.ramirez@alumno.uns.edu.pe',
                'carrera_id' => $carreras[3]->id,
            ]),

            // Ingeniería Mecánica
            Estudiante::create([
                'nombres' => 'Luis Alberto',
                'apellidos' => 'Herrera Campos',
                'dni' => '70567890',
                'email' => 'luis.herrera@alumno.uns.edu.pe',
                'carrera_id' => $carreras[4]->id,
            ]),

            // Ingeniería Agrónoma
            Estudiante::create([
                'nombres' => 'Gabriela',
                'apellidos' => 'Gonzales Vidal',
                'dni' => '70678901',
                'email' => 'gabriela.gonzales@alumno.uns.edu.pe',
                'carrera_id' => $carreras[5]->id,
            ]),

            // Medicina Humana
            Estudiante::create([
                'nombres' => 'Luciana',
                'apellidos' => 'Morales Vega',
                'dni' => '70789012',
                'email' => 'luciana.morales@alumno.uns.edu.pe',
                'carrera_id' => $carreras[6]->id,
            ]),

            // Enfermería
            Estudiante::create([
                'nombres' => 'Valeria',
                'apellidos' => 'Torres Chávez',
                'dni' => '70890123',
                'email' => 'valeria.torres@alumno.uns.edu.pe',
                'carrera_id' => $carreras[7]->id,
            ]),

            // Biotecnología
            Estudiante::create([
                'nombres' => 'Ana Lucía',
                'apellidos' => 'García Ponce',
                'dni' => '70901234',
                'email' => 'ana.garcia@alumno.uns.edu.pe',
                'carrera_id' => $carreras[8]->id,
            ]),

            // Biología en Acuicultura
            Estudiante::create([
                'nombres' => 'Marco Antonio',
                'apellidos' => 'Espinoza Ruiz',
                'dni' => '71012345',
                'email' => 'marco.espinoza@alumno.uns.edu.pe',
                'carrera_id' => $carreras[9]->id,
            ]),
        ];


        /*
        |--------------------------------------------------------------------------
        | 7. MATRÍCULAS
        |--------------------------------------------------------------------------
        | Se generan diferentes estados para probar el sistema.
        */

        $m1 = Matricula::create([
            'estudiante_id' => $estudiantes[0]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-02',
            'estado' => 'Activa',
        ]);

        $m2 = Matricula::create([
            'estudiante_id' => $estudiantes[1]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-03',
            'estado' => 'Activa',
        ]);

        $m3 = Matricula::create([
            'estudiante_id' => $estudiantes[2]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-04',
            'estado' => 'Activa',
        ]);

        $m4 = Matricula::create([
            'estudiante_id' => $estudiantes[3]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-05',
            'estado' => 'Activa',
        ]);

        $m5 = Matricula::create([
            'estudiante_id' => $estudiantes[4]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-06',
            'estado' => 'Activa',
        ]);

        $m6 = Matricula::create([
            'estudiante_id' => $estudiantes[5]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-07',
            'estado' => 'Activa',
        ]);

        $m7 = Matricula::create([
            'estudiante_id' => $estudiantes[6]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-08',
            'estado' => 'Activa',
        ]);

        $m8 = Matricula::create([
            'estudiante_id' => $estudiantes[7]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-09',
            'estado' => 'Activa',
        ]);

        $m9 = Matricula::create([
            'estudiante_id' => $estudiantes[8]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-10',
            'estado' => 'Activa',
        ]);

        $m10 = Matricula::create([
            'estudiante_id' => $estudiantes[9]->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-11',
            'estado' => 'Anulada',
        ]);


        /*
        |--------------------------------------------------------------------------
        | 8. DETALLE DE MATRÍCULAS
        |--------------------------------------------------------------------------
        */

        // Juan Carlos
        DetalleMatricula::create([
            'matricula_id' => $m1->id,
            'horario_id' => $horarios[0]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m1->id,
            'horario_id' => $horarios[1]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m1->id,
            'horario_id' => $horarios[2]->id,
            'nota' => null,
        ]);


        // María Fernanda
        DetalleMatricula::create([
            'matricula_id' => $m2->id,
            'horario_id' => $horarios[0]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m2->id,
            'horario_id' => $horarios[1]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m2->id,
            'horario_id' => $horarios[3]->id,
            'nota' => null,
        ]);


        // Diego
        DetalleMatricula::create([
            'matricula_id' => $m3->id,
            'horario_id' => $horarios[3]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m3->id,
            'horario_id' => $horarios[4]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m3->id,
            'horario_id' => $horarios[5]->id,
            'nota' => null,
        ]);


        // Lucía
        DetalleMatricula::create([
            'matricula_id' => $m4->id,
            'horario_id' => $horarios[6]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m4->id,
            'horario_id' => $horarios[7]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m4->id,
            'horario_id' => $horarios[8]->id,
            'nota' => null,
        ]);


        // Carlos
        DetalleMatricula::create([
            'matricula_id' => $m5->id,
            'horario_id' => $horarios[9]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m5->id,
            'horario_id' => $horarios[10]->id,
            'nota' => null,
        ]);


        // Andrea
        DetalleMatricula::create([
            'matricula_id' => $m6->id,
            'horario_id' => $horarios[11]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m6->id,
            'horario_id' => $horarios[12]->id,
            'nota' => null,
        ]);


        // José
        DetalleMatricula::create([
            'matricula_id' => $m7->id,
            'horario_id' => $horarios[13]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m7->id,
            'horario_id' => $horarios[14]->id,
            'nota' => null,
        ]);


        // Paola
        DetalleMatricula::create([
            'matricula_id' => $m8->id,
            'horario_id' => $horarios[15]->id,
            'nota' => null,
        ]);

        DetalleMatricula::create([
            'matricula_id' => $m8->id,
            'horario_id' => $horarios[16]->id,
            'nota' => null,
        ]);


        // Pedro - Ingeniería Civil
        DetalleMatricula::create([
            'matricula_id' => $m9->id,
            'horario_id' => $horarios[2]->id,
            'nota' => null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | FIN DEL SEEDER
        |--------------------------------------------------------------------------
        */
    }
}