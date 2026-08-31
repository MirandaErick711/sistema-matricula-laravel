@extends('layouts.app')

@section('title', 'Matrículas Académicas')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-journal-check text-danger"></i> Registro de Matrículas
        </h1>
        <p class="page-subtitle">
            Control de inscripciones semestrales, asignaturas matriculadas y estado académico.
        </p>
    </div>
    <div>
        <a href="{{ route('matriculas.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i> Nueva Matrícula
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-journal-text text-danger"></i> Listado de Matrículas
        </h5>
        <span class="badge bg-secondary bg-opacity-10 text-secondary">
            Total: {{ $matriculas->total() }} registros
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 70px;">ID</th>
                    <th>Estudiante</th>
                    <th>Carrera</th>
                    <th>Semestre</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Asignaturas</th>
                    <th class="text-end" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($matriculas as $matricula)
                    <tr>
                        <td><span class="fw-bold text-muted">#{{ $matricula->id }}</span></td>
                        <td>
                            <div class="fw-bold text-dark fs-6">{{ $matricula->estudiante->nombre_completo ?? 'N/A' }}</div>
                            <small class="text-muted font-monospace">DNI: {{ $matricula->estudiante->dni ?? 'N/A' }}</small>
                        </td>
                        <td>
                            <span class="badge bg-primary bg-opacity-10 text-primary">{{ $matricula->estudiante->carrera->nombre ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark">{{ $matricula->semestre }}</span>
                        </td>
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
                        <td>
                            <span class="badge bg-info bg-opacity-10 text-info fw-bold">
                                {{ $matricula->detalles_count }} cursos
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('matriculas.show', $matricula) }}" class="btn btn-outline-secondary" title="Ver Ficha">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('matriculas.edit', $matricula) }}" class="btn btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('matriculas.destroy', $matricula) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar esta matrícula?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-journal-x fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay matrículas registradas.</p>
                            <a href="{{ route('matriculas.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Registrar Primera Matrícula
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($matriculas->hasPages())
        <div class="p-3 border-top d-flex justify-content-center">
            {{ $matriculas->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
