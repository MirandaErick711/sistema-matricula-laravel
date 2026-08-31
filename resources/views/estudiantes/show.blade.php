@extends('layouts.app')

@section('title', $estudiante->nombre_completo)

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-person-badge-fill text-danger"></i> {{ $estudiante->nombre_completo }}
        </h1>
        <p class="page-subtitle">
            Historial de matrículas y ficha del estudiante.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-uns btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar Estudiante
        </a>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Ficha del Estudiante -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4 text-center">
            <div class="stat-icon-wrapper rounded-circle mx-auto mb-3" style="width: 75px; height: 75px; background-color: #e0e7ff; color: #3730a3; font-size: 2rem;">
                <i class="bi bi-person-fill"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">{{ $estudiante->nombre_completo }}</h4>
            <span class="badge bg-light text-dark border font-monospace fs-6 px-3 py-1 mb-3">DNI: {{ $estudiante->dni }}</span>

            <hr class="my-3">

            <div class="text-start">
                <div class="mb-3">
                    <span class="text-muted small d-block">Carrera Profesional</span>
                    <strong class="text-success"><i class="bi bi-mortarboard me-1"></i> {{ $estudiante->carrera->nombre ?? 'N/A' }}</strong>
                </div>
                <div class="mb-3">
                    <span class="text-muted small d-block">Correo Electrónico</span>
                    <strong class="text-dark">{{ $estudiante->email ?? 'No registrado' }}</strong>
                </div>
                <div class="mb-0">
                    <span class="text-muted small d-block">Total de Matrículas</span>
                    <span class="badge bg-primary bg-opacity-10 text-primary fs-6 fw-bold mt-1">
                        {{ $estudiante->matriculas->count() }} periodos
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Matrículas -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-journal-check text-danger"></i> Historial de Matrículas
                </h5>
                <a href="{{ route('matriculas.create') }}" class="btn btn-sm btn-uns">
                    <i class="bi bi-plus-circle me-1"></i> Nueva Matrícula
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th>Semestre</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Asignaturas</th>
                            <th class="text-end">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estudiante->matriculas as $mat)
                            <tr>
                                <td><span class="fw-bold text-dark">{{ $mat->semestre }}</span></td>
                                <td>{{ $mat->fecha_matricula ? $mat->fecha_matricula->format('d/m/Y') : '-' }}</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success fw-bold">{{ $mat->estado }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info bg-opacity-10 text-info fw-semibold">{{ $mat->detalles->count() }} cursos</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('matriculas.show', $mat) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-journal-x fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">Este estudiante no tiene matrículas registradas.</p>
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
