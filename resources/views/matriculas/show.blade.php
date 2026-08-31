@extends('layouts.app')

@section('title', 'Ficha de Matrícula #' . $matricula->id)

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-journal-bookmark-fill text-danger"></i> Ficha de Matrícula #{{ $matricula->id }}
        </h1>
        <p class="page-subtitle">
            Detalle de asignaturas inscritas, horarios y control académico.
        </p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        @if($matricula->estado === 'Activa')
            <a href="{{ route('detalle-matricula.create', $matricula) }}" class="btn btn-uns btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i> Inscribir Asignatura
            </a>
        @endif
        <a href="{{ route('matriculas.edit', $matricula) }}" class="btn btn-outline-primary btn-sm">
            <i class="bi bi-pencil-fill me-1"></i> Editar
        </a>
        <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row g-4">
    <!-- Información de la Matrícula -->
    <div class="col-lg-4">
        <div class="card-uns border-top-uns p-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <span class="badge bg-secondary bg-opacity-10 text-dark font-monospace">Nº Registro #{{ $matricula->id }}</span>
                @if($matricula->estado === 'Activa')
                    <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-1">
                        <i class="bi bi-check-circle-fill"></i> Activa
                    </span>
                @elseif($matricula->estado === 'Anulada')
                    <span class="badge bg-danger bg-opacity-10 text-danger fw-bold px-3 py-1">
                        <i class="bi bi-x-circle-fill"></i> Anulada
                    </span>
                @else
                    <span class="badge bg-secondary bg-opacity-10 text-secondary fw-bold px-3 py-1">
                        {{ $matricula->estado }}
                    </span>
                @endif
            </div>

            <div class="mb-3">
                <span class="text-muted small d-block">Estudiante</span>
                <h5 class="fw-bold text-dark mb-0">
                    {{ $matricula->estudiante->nombre_completo ?? 'N/A' }}
                </h5>
                <span class="badge bg-light text-dark border font-monospace mt-1">DNI: {{ $matricula->estudiante->dni ?? 'N/A' }}</span>
            </div>

            <div class="mb-3">
                <span class="text-muted small d-block">Escuela Profesional / Carrera</span>
                <span class="badge bg-primary bg-opacity-10 text-primary">{{ $matricula->estudiante->carrera->nombre ?? 'N/A' }}</span>
            </div>

            <hr class="my-3">

            <div class="mb-3">
                <span class="text-muted small d-block">Periodo / Semestre</span>
                <strong class="text-dark"><i class="bi bi-calendar3 me-1 text-muted"></i>{{ $matricula->semestre }}</strong>
            </div>

            <div class="mb-3">
                <span class="text-muted small d-block">Fecha de Emisión</span>
                <span class="text-dark">{{ $matricula->fecha_matricula ? $matricula->fecha_matricula->format('d/m/Y') : 'N/A' }}</span>
            </div>

            <div class="mb-0">
                <span class="text-muted small d-block">Carga Académica Total</span>
                <span class="badge bg-warning bg-opacity-25 text-dark border border-warning fs-6 fw-bold mt-1">
                    {{ $totalCreditos }} créditos en {{ $matricula->detalles->count() }} cursos
                </span>
            </div>
        </div>
    </div>

    <!-- Asignaturas Matriculadas -->
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-book-half text-danger"></i> Asignaturas y Horarios Inscritos
                </h5>
                @if($matricula->estado === 'Activa')
                    <a href="{{ route('detalle-matricula.create', $matricula) }}" class="btn btn-sm btn-uns">
                        <i class="bi bi-plus-lg me-1"></i> Agregar Asignatura
                    </a>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-uns align-middle">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Asignatura</th>
                            <th>Horario y Aula</th>
                            <th>Docente</th>
                            <th style="width: 80px;">Créditos</th>
                            @if($matricula->estado === 'Activa')
                                <th class="text-end" style="width: 80px;">Retirar</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($matricula->detalles as $detalle)
                            <tr>
                                <td>
                                    <span class="badge bg-light text-dark border font-monospace">{{ $detalle->horario->curso->codigo ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $detalle->horario->curso->nombre ?? 'N/A' }}</div>
                                </td>
                                <td>
                                    <div class="small fw-semibold text-primary">
                                        <i class="bi bi-clock me-1"></i> {{ $detalle->horario->dia }} {{ substr($detalle->horario->hora_inicio, 0, 5) }} - {{ substr($detalle->horario->hora_fin, 0, 5) }}
                                    </div>
                                    <small class="text-muted"><i class="bi bi-door-closed me-1"></i>{{ $detalle->horario->aula->nombre ?? 'N/A' }}</small>
                                </td>
                                <td>
                                    <small class="text-dark">{{ $detalle->horario->curso->docente->nombre_completo ?? 'Sin asignar' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-warning bg-opacity-25 text-dark border border-warning">{{ $detalle->horario->curso->creditos ?? 0 }} cr.</span>
                                </td>
                                @if($matricula->estado === 'Activa')
                                    <td class="text-end">
                                        <form action="{{ route('detalle-matricula.destroy', [$matricula, $detalle]) }}" method="POST" onsubmit="return confirm('¿Retirar la asignatura {{ $detalle->horario->curso->nombre ?? '' }} de la matrícula?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Retirar curso">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $matricula->estado === 'Activa' ? 6 : 5 }}" class="text-center py-5 text-muted">
                                    <i class="bi bi-journal-x fs-1 d-block mb-3 opacity-50"></i>
                                    <p class="fs-6 mb-2">No hay asignaturas inscritas en esta matrícula.</p>
                                    @if($matricula->estado === 'Activa')
                                        <a href="{{ route('detalle-matricula.create', $matricula) }}" class="btn btn-sm btn-uns">
                                            <i class="bi bi-plus-circle me-1"></i> Inscribir Primera Asignatura
                                        </a>
                                    @endif
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
