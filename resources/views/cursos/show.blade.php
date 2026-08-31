@extends('layouts.app')

@section('title', $curso->nombre)

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-book-fill text-danger"></i> {{ $curso->nombre }}
        </h1>
        <p class="page-subtitle">
            Ficha técnica de la asignatura, docente asignado y programación de horarios.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-uns btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar Curso
        </a>
        <a href="{{ route('cursos.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Información de la Asignatura -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4">
            <div class="text-center mb-3">
                <span class="badge bg-primary bg-opacity-10 text-primary font-monospace fs-6 px-3 py-2 rounded-pill mb-2">
                    {{ $curso->codigo }}
                </span>
                <h4 class="fw-bold text-dark mb-1">{{ $curso->nombre }}</h4>
            </div>

            <hr class="my-3">

            <div class="mb-3">
                <span class="text-muted small d-block">Créditos Académicos</span>
                <span class="badge bg-warning bg-opacity-25 text-dark border border-warning fs-6 fw-bold mt-1">
                    {{ $curso->creditos }} créditos
                </span>
            </div>

            <div class="mb-3">
                <span class="text-muted small d-block">Docente Responsable</span>
                @if($curso->docente)
                    <div class="fw-bold text-dark mt-1">
                        <i class="bi bi-person-badge text-danger me-1"></i> {{ $curso->docente->nombre_completo }}
                    </div>
                    <small class="text-muted">{{ $curso->docente->email ?? '' }}</small>
                @else
                    <span class="text-muted fst-italic">No asignado</span>
                @endif
            </div>

            <hr class="my-3">

            <div class="d-grid">
                <a href="{{ route('horarios.create') }}" class="btn btn-outline-uns btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Programar Nuevo Horario
                </a>
            </div>
        </div>
    </div>

    <!-- Horarios Programados -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-clock-history text-danger"></i> Horarios Programados para este Curso
                </h5>
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Día</th>
                            <th>Horario</th>
                            <th>Aula / Ambiente</th>
                            <th class="text-end" style="width: 100px;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($curso->horarios as $horario)
                            <tr>
                                <td><span class="fw-bold text-muted">#{{ $horario->id }}</span></td>
                                <td>
                                    <span class="badge bg-primary px-2 py-1 fw-bold">{{ $horario->dia }}</span>
                                </td>
                                <td>
                                    <span class="font-monospace fw-semibold">{{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}</span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $horario->aula->nombre ?? 'N/A' }}</div>
                                    <small class="text-muted">Aforo: {{ $horario->aula->capacidad ?? '-' }} est.</small>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('horarios.show', $horario) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-clock fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">No hay horarios programados para este curso.</p>
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
