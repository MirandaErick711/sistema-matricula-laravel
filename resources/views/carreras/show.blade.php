@extends('layouts.app')

@section('title', $carrera->nombre)

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-mortarboard-fill text-danger"></i> {{ $carrera->nombre }}
        </h1>
        <p class="page-subtitle">
            Detalles de la escuela profesional y estudiantes matriculables registrados.
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-uns btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar Carrera
        </a>
        <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver a Carreras
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Resumen de Carrera -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4">
            <div class="text-center mb-3">
                <div class="mx-auto mb-3 stat-icon-wrapper rounded-circle" style="width: 75px; height: 75px; background-color: #d1fae5; color: #065f46; font-size: 2rem;">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <h4 class="fw-bold text-dark mb-1">{{ $carrera->nombre }}</h4>
                <span class="badge bg-secondary bg-opacity-10 text-secondary font-monospace">Código Carrera #{{ $carrera->id }}</span>
            </div>

            <hr class="my-3">

            <div class="mb-3">
                <span class="text-muted small d-block">Total de Estudiantes Registrados</span>
                <span class="badge bg-primary bg-opacity-10 text-primary fs-6 fw-bold mt-1">{{ $carrera->estudiantes->count() }} alumnos</span>
            </div>

            <div class="d-grid mt-4">
                <a href="{{ route('estudiantes.create') }}" class="btn btn-outline-uns btn-sm">
                    <i class="bi bi-person-plus-fill me-1"></i> Registrar Estudiante
                </a>
            </div>
        </div>
    </div>

    <!-- Lista de Estudiantes Registrados -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-people-fill text-danger"></i> Estudiantes de la Carrera
                </h5>
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>DNI</th>
                            <th>Nombres y Apellidos</th>
                            <th>Email</th>
                            <th class="text-end" style="width: 100px;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($carrera->estudiantes as $estudiante)
                            <tr>
                                <td>
                                    <span class="fw-bold text-muted">#{{ $estudiante->id }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace">{{ $estudiante->dni }}</span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $estudiante->nombre_completo }}</div>
                                </td>
                                <td>{{ $estudiante->email ?? 'N/A' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('estudiantes.show', $estudiante) }}" class="btn btn-sm btn-outline-secondary" title="Ver perfil">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-people fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">No hay estudiantes registrados en esta carrera.</p>
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
