<?php

namespace Tests\Feature;

use App\Models\Aula;
use App\Models\Carrera;
use App\Models\Curso;
use App\Models\DetalleMatricula;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Horario;
use App\Models\Matricula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewsRenderTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_academic_pages_render_successfully_without_auth()
    {
        // 1. Crear datos base
        $carrera = Carrera::create(['nombre' => 'Ingeniería de Sistemas e Informática']);
        $docente = Docente::create(['nombres' => 'Carlos', 'apellidos' => 'Mendoza', 'email' => 'carlos.mendoza@uns.edu.pe']);
        $aula = Aula::create(['nombre' => 'Aula 101', 'capacidad' => 35]);
        $curso = Curso::create(['codigo' => 'SIS-101', 'nombre' => 'Algoritmos I', 'creditos' => 4, 'docente_id' => $docente->id]);
        $horario = Horario::create([
            'curso_id' => $curso->id,
            'aula_id' => $aula->id,
            'dia' => 'Lunes',
            'hora_inicio' => '08:00',
            'hora_fin' => '10:00',
        ]);
        $estudiante = Estudiante::create([
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'dni' => '71234567',
            'email' => 'juan@uns.edu.pe',
            'carrera_id' => $carrera->id,
        ]);
        $matricula = Matricula::create([
            'estudiante_id' => $estudiante->id,
            'semestre' => '2026-I',
            'fecha_matricula' => '2026-03-01',
            'estado' => 'Activa',
        ]);
        $detalle = DetalleMatricula::create([
            'matricula_id' => $matricula->id,
            'horario_id' => $horario->id,
        ]);

        // Home y Dashboard
        $this->get(route('home'))->assertOk();
        $this->get(route('dashboard'))->assertOk();

        // Carreras
        $this->get(route('carreras.index'))->assertOk();
        $this->get(route('carreras.create'))->assertOk();
        $this->get(route('carreras.show', $carrera))->assertOk();
        $this->get(route('carreras.edit', $carrera))->assertOk();

        // Docentes
        $this->get(route('docentes.index'))->assertOk();
        $this->get(route('docentes.create'))->assertOk();
        $this->get(route('docentes.show', $docente))->assertOk();
        $this->get(route('docentes.edit', $docente))->assertOk();

        // Aulas
        $this->get(route('aulas.index'))->assertOk();
        $this->get(route('aulas.create'))->assertOk();
        $this->get(route('aulas.show', $aula))->assertOk();
        $this->get(route('aulas.edit', $aula))->assertOk();

        // Cursos
        $this->get(route('cursos.index'))->assertOk();
        $this->get(route('cursos.create'))->assertOk();
        $this->get(route('cursos.show', $curso))->assertOk();
        $this->get(route('cursos.edit', $curso))->assertOk();

        // Horarios
        $this->get(route('horarios.index'))->assertOk();
        $this->get(route('horarios.create'))->assertOk();
        $this->get(route('horarios.show', $horario))->assertOk();
        $this->get(route('horarios.edit', $horario))->assertOk();

        // Estudiantes
        $this->get(route('estudiantes.index'))->assertOk();
        $this->get(route('estudiantes.create'))->assertOk();
        $this->get(route('estudiantes.show', $estudiante))->assertOk();
        $this->get(route('estudiantes.edit', $estudiante))->assertOk();

        // Matrículas y Detalle
        $this->get(route('matriculas.index'))->assertOk();
        $this->get(route('matriculas.create'))->assertOk();
        $this->get(route('matriculas.show', $matricula))->assertOk();
        $this->get(route('matriculas.edit', $matricula))->assertOk();
        $this->get(route('detalle-matricula.create', $matricula))->assertOk();
    }

    public function test_can_create_and_manage_matricula_flow()
    {
        $carrera = Carrera::create(['nombre' => 'Medicina Humana']);
        $docente = Docente::create(['nombres' => 'Elena', 'apellidos' => 'Paredes']);
        $aula = Aula::create(['nombre' => 'Aula 201', 'capacidad' => 40]);
        $curso = Curso::create(['codigo' => 'MED-101', 'nombre' => 'Anatomía', 'creditos' => 5, 'docente_id' => $docente->id]);
        $horario = Horario::create([
            'curso_id' => $curso->id,
            'aula_id' => $aula->id,
            'dia' => 'Martes',
            'hora_inicio' => '10:00',
            'hora_fin' => '12:00',
        ]);
        $estudiante = Estudiante::create([
            'nombres' => 'Ana',
            'apellidos' => 'Torres',
            'dni' => '87654321',
            'carrera_id' => $carrera->id,
        ]);

        // Crear matrícula
        $response = $this->post(route('matriculas.store'), [
            'estudiante_id' => $estudiante->id,
            'semestre' => '2026-II',
            'fecha_matricula' => '2026-08-15',
            'estado' => 'Activa',
        ]);
        $response->assertRedirect();

        $matricula = Matricula::where('estudiante_id', $estudiante->id)->first();
        $this->assertNotNull($matricula);
        $this->assertEquals('2026-II', $matricula->semestre);

        // Inscribir curso/horario
        $responseDetalle = $this->post(route('detalle-matricula.store', $matricula), [
            'horario_id' => $horario->id,
        ]);
        $responseDetalle->assertRedirect(route('matriculas.show', $matricula));
        $this->assertDatabaseHas('detalle_matricula', [
            'matricula_id' => $matricula->id,
            'horario_id' => $horario->id,
        ]);

        // Retirar curso/horario
        $detalle = DetalleMatricula::where('matricula_id', $matricula->id)->first();
        $responseDelete = $this->delete(route('detalle-matricula.destroy', [$matricula, $detalle]));
        $responseDelete->assertRedirect(route('matriculas.show', $matricula));
        $this->assertDatabaseMissing('detalle_matricula', [
            'id' => $detalle->id,
        ]);
    }
}
