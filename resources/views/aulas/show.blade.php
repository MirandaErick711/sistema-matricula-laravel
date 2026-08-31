@extends('layouts.app')

@section('title', $aula->nombre)

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-door-open-fill text-danger"></i> {{ $aula->nombre }}
        </h1>
        <p class="page-subtitle">
            Capacidad de aforo y programación de clases en este ambiente.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-uns btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar Aula
        </a>
        <a href="{{ route('aulas.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Información del Aula -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4 text-center">
            <div class="stat-icon-wrapper rounded-circle mx-auto mb-3" style="width: 75px; height: 75px; background-color: #fae8ff; color: #86198f; font-size: 2rem;">
                <i class="bi bi-door-closed-fill"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">{{ $aula->nombre }}</h4>
            <span class="badge bg-secondary bg-opacity-10 text-secondary font-monospace">Aula #{{ $aula->id }}</span>

            <hr class="my-3">

            <div class="text-start">
                <div class="mb-3">
                    <span class="text-muted small d-block">Capacidad de Aforo</span>
                    <span class="badge bg-light text-dark border fs-6 fw-bold mt-1">
                        <i class="bi bi-people-fill me-1"></i> {{ $aula->capacidad }} estudiantes
                    </span>
                </div>
                <div class="mb-0">
                    <span class="text-muted small d-block">Total de Clases Asignadas</span>
                    <span class="badge bg-info bg-opacity-10 text-info fs-6 fw-bold mt-1">
                        {{ $aula->horarios->count() }} horarios
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Horarios Programados -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-clock-history text-danger"></i> Programación de Clases en esta Aula
                </h5>
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Horario</th>
                            <th>Asignatura</th>
                            <th>Docente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($aula->horarios as $horario)
                            <tr>
                                <td><span class="badge bg-primary px-2 py-1 fw-bold">{{ $horario->dia }}</span></td>
                                <td><span class="font-monospace fw-semibold">{{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}</span></td>
                                <td><div class="fw-bold text-dark">{{ $horario->curso->nombre ?? 'N/A' }}</div></td>
                                <td>{{ $horario->curso->docente->nombre_completo ?? 'N/A' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-calendar-x fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">No hay clases asignadas en esta aula.</p>
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
