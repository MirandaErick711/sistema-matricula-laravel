@extends('layouts.app')

@section('title', 'Inscribir Asignatura en Matrícula')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-journal-plus text-danger"></i> Inscribir Asignatura en Matrícula #{{ $matricula->id }}
        </h1>
        <p class="page-subtitle">
            Estudiante: <strong>{{ $matricula->estudiante->nombre_completo }}</strong> | Semestre: <strong>{{ $matricula->semestre }}</strong>
        </p>
    </div>
    <a href="{{ route('matriculas.show', $matricula) }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver a la Ficha
    </a>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-calendar-check text-danger"></i> Oferta de Horarios y Asignaturas Disponibles
        </h5>
        <span class="text-muted small">Selecciona la clase que deseas matricular</span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 90px;">Código</th>
                    <th>Asignatura</th>
                    <th>Créditos</th>
                    <th>Día y Rango Horario</th>
                    <th>Aula y Aforo</th>
                    <th>Docente Responsable</th>
                    <th class="text-end" style="width: 140px;">Acción</th>
                </tr>
            </thead>
            <tbody>
                @forelse($horarios as $horario)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace fw-bold">{{ $horario->curso->codigo ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark fs-6">{{ $horario->curso->nombre ?? 'N/A' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-warning bg-opacity-25 text-dark border border-warning">{{ $horario->curso->creditos ?? '-' }} cr.</span>
                        </td>
                        <td>
                            <span class="badge bg-primary px-2 py-1 fw-bold">{{ $horario->dia }}</span>
                            <span class="font-monospace ms-1 fw-semibold">{{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}</span>
                        </td>
                        <td>
                            <div>{{ $horario->aula->nombre ?? 'N/A' }}</div>
                            <small class="text-muted">Aforo: {{ $horario->detalles_matricula_count }}/{{ $horario->aula->capacidad ?? '-' }} inscritos</small>
                        </td>
                        <td>
                            <div class="text-dark small">{{ $horario->curso->docente->nombre_completo ?? 'Sin asignar' }}</div>
                        </td>
                        <td class="text-end">
                            <form action="{{ route('detalle-matricula.store', $matricula) }}" method="POST">
                                @csrf
                                <input type="hidden" name="horario_id" value="{{ $horario->id }}">
                                <button type="submit" class="btn btn-sm btn-uns">
                                    <i class="bi bi-plus-circle me-1"></i> Inscribir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-calendar-x fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay horarios disponibles en el sistema.</p>
                            <a href="{{ route('horarios.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Programar Nuevo Horario
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
