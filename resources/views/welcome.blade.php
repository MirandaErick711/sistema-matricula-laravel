@extends('layouts.app')

@section('title', 'Bienvenido al Sistema de Matrícula')

@section('content')
<div class="py-4">
    <!-- Hero Banner Institucional -->
    <div class="card-uns p-4 p-md-5 mb-5 text-white" style="background: linear-gradient(135deg, #6b0000 0%, #8b0000 50%, #4a0000 100%); border-top: 4px solid var(--uns-gold);">
        <div class="row align-items-center gy-4">
            <div class="col-lg-8">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-white bg-opacity-10 border border-white border-opacity-25 text-warning small fw-semibold mb-3">
                    <i class="bi bi-patch-check-fill"></i> Sistema Oficial de Gestión Académica UNS
                </div>
                <h1 class="display-6 fw-bold mb-2">Universidad Nacional del Santa</h1>
                <p class="fs-5 text-white-50 mb-4">
                    Plataforma Institucional para la administración de matrículas, asignaturas, horarios de clase, docentes y escuelas profesionales.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('matriculas.index') }}" class="btn btn-warning fw-bold px-4 py-2 text-dark shadow-sm">
                        <i class="bi bi-journal-check me-1"></i> Gestionar Matrículas
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-light px-4 py-2">
                        <i class="bi bi-speedometer2 me-1"></i> Panel Dashboard
                    </a>
<a href="{{ route('estudiantes.index') }}" class="btn btn-outline-light px-4 py-2">
    <i class="bi bi-people-fill me-1"></i> Estudiantes
</a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
<img src="{{ asset('images/logo-nuevo.png') }}" alt="Escudo UNS" class="img-fluid drop-shadow" style="max-height: 300px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));">
            </div>
        </div>
    </div>

    <!-- Secciones y Módulos del Sistema -->
    <div class="mb-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h4 class="fw-bold text-dark mb-0"><i class="bi bi-grid-fill text-danger me-2"></i> Módulos del Sistema Académico</h4>
                <p class="text-muted small mb-0">Selecciona el área de gestión que deseas administrar</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Matrículas -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #fee2e2; color: #800000;">
                                <i class="bi bi-journal-check"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Matrículas</h5>
                                <span class="badge bg-danger bg-opacity-10 text-danger small">Gestión Principal</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Registro de matrículas por periodo, inscripción de horarios y asignaturas, y control de estados.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('matriculas.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Matrículas
                        </a>
                        <a href="{{ route('matriculas.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Estudiantes -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #e0e7ff; color: #3730a3;">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Estudiantes</h5>
                                <span class="badge bg-primary bg-opacity-10 text-primary small">Padrón Estudiantil</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Administración de estudiantes, registro con DNI único, asignación de escuela profesional y contacto.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Estudiantes
                        </a>
                        <a href="{{ route('estudiantes.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cursos -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #fef3c7; color: #92400e;">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Cursos</h5>
                                <span class="badge bg-warning bg-opacity-10 text-dark small">Plan Curricular</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Catálogo de asignaturas académicas, definición de créditos y asignación de docentes responsables.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('cursos.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Cursos
                        </a>
                        <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Horarios -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #e0f2fe; color: #0369a1;">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Horarios</h5>
                                <span class="badge bg-info bg-opacity-10 text-info small">Cronograma Semanal</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Programación de días y horas de clase por curso y aula, con control de capacidad física.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('horarios.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Horarios
                        </a>
                        <a href="{{ route('horarios.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Aulas -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #fae8ff; color: #86198f;">
                                <i class="bi bi-door-open-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Aulas y Ambientes</h5>
                                <span class="badge bg-dark bg-opacity-10 text-dark small">Infraestructura</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Control de aulas físicas y laboratorios del campus universitario, asignación de aforo y capacidad.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('aulas.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Aulas
                        </a>
                        <a href="{{ route('aulas.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Docentes -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #fce7f3; color: #9d174d;">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Plana Docente</h5>
                                <span class="badge bg-info bg-opacity-10 text-dark small">Cuerpo Académico</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Registro de docentes universitarios, asignación de asignaturas y supervisión académica.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('docentes.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Docentes
                        </a>
                        <a href="{{ route('docentes.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carreras Profesionales -->
            <div class="col-md-6 col-xl-4">
                <div class="card-uns h-100 p-4 border-top-uns d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="stat-icon-wrapper" style="background-color: #d1fae5; color: #065f46;">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Carreras</h5>
                                <span class="badge bg-success bg-opacity-10 text-success small">Escuelas Profesionales</span>
                            </div>
                        </div>
                        <p class="text-muted small mb-3">
                            Gestión de carreras y escuelas profesionales de la UNS y administración del alumnado adscrito.
                        </p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('carreras.index') }}" class="btn btn-sm btn-uns flex-grow-1">
                            <i class="bi bi-list me-1"></i> Listar Carreras
                        </a>
                        <a href="{{ route('carreras.create') }}" class="btn btn-sm btn-outline-uns">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
