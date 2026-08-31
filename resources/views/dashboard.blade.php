@extends('layouts.app')

@section('title', 'Dashboard Académico')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-speedometer2 text-danger"></i> Panel de Control Académico
        </h1>
        <p class="page-subtitle">
            Resumen estadístico institucional, métricas en tiempo real y actividad reciente de matrículas.
        </p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('matriculas.create') }}" class="btn btn-uns btn-sm">
            <i class="bi bi-plus-circle me-1"></i> Nueva Matrícula
        </a>
    </div>
</div>
@endsection

@section('content')
<!-- KPI Stat Cards Grid -->
<div class="row g-3 mb-4">
    <!-- Matrículas -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #fee2e2; color: #800000;">
                <i class="bi bi-journal-check"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_matriculas'] }}</div>
                <div class="text-muted small fw-medium">Matrículas Registradas</div>
            </div>
        </div>
    </div>

    <!-- Estudiantes -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #e0e7ff; color: #3730a3;">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_estudiantes'] }}</div>
                <div class="text-muted small fw-medium">Estudiantes Activos</div>
            </div>
        </div>
    </div>

    <!-- Docentes -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #fce7f3; color: #9d174d;">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_docentes'] }}</div>
                <div class="text-muted small fw-medium">Docentes Registrados</div>
            </div>
        </div>
    </div>

    <!-- Cursos -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #fef3c7; color: #92400e;">
                <i class="bi bi-book-fill"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_cursos'] }}</div>
                <div class="text-muted small fw-medium">Asignaturas en Plan</div>
            </div>
        </div>
    </div>

    <!-- Horarios -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #e0f2fe; color: #0284c7;">
                <i class="bi bi-clock-fill"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_horarios'] }}</div>
                <div class="text-muted small fw-medium">Horarios Programados</div>
            </div>
        </div>
    </div>

    <!-- Aulas -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #fae8ff; color: #86198f;">
                <i class="bi bi-door-open-fill"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_aulas'] }}</div>
                <div class="text-muted small fw-medium">Aulas y Ambientes</div>
            </div>
        </div>
    </div>

    <!-- Carreras -->
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon-wrapper" style="background-color: #d1fae5; color: #065f46;">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
                <div class="fs-4 fw-bold text-dark lh-1 mb-1">{{ $stats['total_carreras'] }}</div>
                <div class="text-muted small fw-medium">Escuelas Profesionales</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Tabla de Últimas Matrículas -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-clock-history text-danger"></i> Últimas Matrículas Registradas
                </h5>
                <a href="{{ route('matriculas.index') }}" class="btn btn-outline-uns btn-sm">
                    Ver Todas <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estudiante</th>
                            <th>Carrera</th>
                            <th>Semestre</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th class="text-end">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultimasMatriculas as $matricula)
                            <tr>
                                <td>
                                    <span class="fw-bold text-muted">#{{ $matricula->id }}</span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $matricula->estudiante->nombre_completo ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-primary bg-opacity-10 text-primary">{{ $matricula->estudiante->carrera->nombre ?? 'N/A' }}</span>
                                </td>
                                <td>{{ $matricula->semestre }}</td>
                                <td>{{ $matricula->fecha_matricula ? $matricula->fecha_matricula->format('d/m/Y') : 'N/A' }}</td>
                                <td>
                                    @if($matricula->estado === 'Activa')
                                        <span class="badge bg-success bg-opacity-10 text-success fw-bold px-2 py-1">
                                            <i class="bi bi-check-circle-fill"></i> Activa
                                        </span>
                                    @elseif($matricula->estado === 'Anulada')
                                        <span class="badge bg-danger bg-opacity-10 text-danger fw-bold px-2 py-1">
                                            <i class="bi bi-x-circle-fill"></i> Anulada
                                        </span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary fw-bold px-2 py-1">
                                            <i class="bi bi-dash-circle"></i> {{ $matricula->estado }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('matriculas.show', $matricula) }}" class="btn btn-sm btn-outline-secondary" title="Ver Detalle">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="bi bi-inbox fs-2 d-block mb-2 text-muted opacity-50"></i>
                                    No hay matrículas registradas recientemente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Panel Lateral de Accesos Rápidos -->
    <div class="col-lg-4">
        <!-- Accesos Directos -->
        <div class="card-uns p-4 border-top-uns">
            <h6 class="fw-bold text-dark mb-3">
                <i class="bi bi-lightning-charge-fill text-warning me-2"></i> Operaciones Rápidas
            </h6>
            <div class="d-grid gap-2">
                <a href="{{ route('matriculas.create') }}" class="btn btn-uns text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-journal-plus me-2"></i> Nueva Matrícula</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{ route('estudiantes.create') }}" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-person-plus-fill me-2 text-primary"></i> Registrar Estudiante</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{ route('horarios.create') }}" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-clock-history me-2 text-info"></i> Programar Horario</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{ route('cursos.create') }}" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-book me-2 text-warning"></i> Registrar Curso</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{ route('docentes.create') }}" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-person-badge me-2 text-danger"></i> Registrar Docente</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{ route('aulas.create') }}" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-door-open me-2 text-purple"></i> Registrar Aula</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
                <a href="{{ route('carreras.create') }}" class="btn btn-outline-secondary text-start d-flex align-items-center justify-content-between">
                    <span><i class="bi bi-mortarboard me-2 text-success"></i> Registrar Carrera</span>
                    <i class="bi bi-chevron-right small"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
