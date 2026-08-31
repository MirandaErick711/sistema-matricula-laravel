@extends('layouts.app')

@section('title', $docente->nombre_completo)

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-person-badge-fill text-danger"></i> {{ $docente->nombre_completo }}
        </h1>
        <p class="page-subtitle">
            Ficha académica del docente y cursos asignados.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-uns btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar Docente
        </a>
        <a href="{{ route('docentes.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Información del Docente -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4 text-center">
            <div class="stat-icon-wrapper rounded-circle mx-auto mb-3" style="width: 75px; height: 75px; background-color: #fce7f3; color: #9d174d; font-size: 2rem;">
                <i class="bi bi-person-fill"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">{{ $docente->nombre_completo }}</h4>
            <span class="badge bg-secondary bg-opacity-10 text-secondary font-monospace">Docente #{{ $docente->id }}</span>

            <hr class="my-3">

            <div class="text-start">
                <div class="mb-3">
                    <span class="text-muted small d-block">Correo Institucional</span>
                    <strong class="text-dark">{{ $docente->email ?? 'No registrado' }}</strong>
                </div>
                <div class="mb-0">
                    <span class="text-muted small d-block">Total de Cursos Asignados</span>
                    <span class="badge bg-danger bg-opacity-10 text-danger fs-6 fw-bold mt-1">
                        {{ $docente->cursos->count() }} asignaturas
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Cursos a Cargo -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-book-half text-danger"></i> Asignaturas a Cargo
                </h5>
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th style="width: 90px;">Código</th>
                            <th>Asignatura</th>
                            <th style="width: 100px;">Créditos</th>
                            <th class="text-end" style="width: 100px;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($docente->cursos as $curso)
                            <tr>
                                <td><span class="badge bg-light text-dark border font-monospace">{{ $curso->codigo }}</span></td>
                                <td><div class="fw-bold text-dark">{{ $curso->nombre }}</div></td>
                                <td><span class="badge bg-warning bg-opacity-25 text-dark border border-warning">{{ $curso->creditos }} cr.</span></td>
                                <td class="text-end">
                                    <a href="{{ route('cursos.show', $curso) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-book fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">Este docente no tiene asignaturas asignadas actualmente.</p>
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
