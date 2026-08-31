@extends('layouts.app')

@section('title', 'Detalle de Horario')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-clock-fill text-danger"></i> Horario: {{ $horario->dia }} {{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}
        </h1>
        <p class="page-subtitle">
            Detalle del curso, docente, aula y estudiantes matriculados en este horario.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-uns btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar
        </a>
        <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Información del Horario -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4">
            <div class="text-center mb-3">
                <span class="badge bg-primary fs-6 px-3 py-2 rounded-pill mb-2">{{ $horario->dia }}</span>
                <h4 class="fw-bold text-dark mb-1">{{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}</h4>
            </div>

            <hr class="my-3">

            <div class="mb-3">
                <span class="text-muted small d-block">Asignatura</span>
                <strong class="text-dark fs-6">{{ $horario->curso->nombre ?? 'N/A' }}</strong>
                <small class="text-muted d-block font-monospace">{{ $horario->curso->codigo ?? '' }} ({{ $horario->curso->creditos ?? '' }} créditos)</small>
            </div>

            <div class="mb-3">
                <span class="text-muted small d-block">Docente Responsable</span>
                <strong class="text-dark">{{ $horario->curso->docente->nombre_completo ?? 'Sin asignar' }}</strong>
            </div>

            <div class="mb-3">
                <span class="text-muted small d-block">Aula Asignada</span>
                <span class="badge bg-light text-dark border fs-6 fw-bold">
                    <i class="bi bi-door-closed me-1"></i> {{ $horario->aula->nombre ?? 'N/A' }} (Capacidad: {{ $horario->aula->capacidad ?? '-' }})
                </span>
            </div>

            <div class="mb-0">
                <span class="text-muted small d-block">Estudiantes Matriculados</span>
                <span class="badge bg-success bg-opacity-10 text-success fs-6 fw-bold">
                    {{ $horario->detallesMatricula->count() }} alumnos
                </span>
            </div>
        </div>
    </div>

    <!-- Alumnos Matriculados -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-people-fill text-danger"></i> Estudiantes Matriculados en este Horario
                </h5>
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Estudiante</th>
                            <th>Semestre</th>
                            <th>Fecha Matrícula</th>
                            <th class="text-end">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($horario->detallesMatricula as $detalle)
                            <tr>
                                <td><span class="badge bg-light text-dark border font-monospace">{{ $detalle->matricula->estudiante->dni ?? 'N/A' }}</span></td>
                                <td><div class="fw-bold text-dark">{{ $detalle->matricula->estudiante->nombre_completo ?? 'N/A' }}</div></td>
                                <td>{{ $detalle->matricula->semestre ?? 'N/A' }}</td>
                                <td>{{ $detalle->matricula->fecha_matricula ? $detalle->matricula->fecha_matricula->format('d/m/Y') : '-' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('matriculas.show', $detalle->matricula) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-people fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">No hay estudiantes matriculados en este horario.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
