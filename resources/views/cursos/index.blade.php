@extends('layouts.app')

@section('title', 'Cursos Académicos')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-book-fill text-danger"></i> Catálogo de Cursos y Asignaturas
        </h1>
        <p class="page-subtitle">
            Administración del plan de asignaturas, créditos académicos y docentes responsables.
        </p>
    </div>
    <div>
        <a href="{{ route('cursos.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Curso
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-book text-danger"></i> Asignaturas Registradas
        </h5>
        <span class="badge bg-secondary bg-opacity-10 text-secondary">
            Total: {{ $cursos->total() }} cursos
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 100px;">Código</th>
                    <th>Nombre de la Asignatura</th>
                    <th style="width: 120px;">Créditos</th>
                    <th>Docente Responsable</th>
                    <th style="width: 130px;">Horarios</th>
                    <th class="text-end" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cursos as $curso)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace fw-bold">{{ $curso->codigo }}</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark fs-6">{{ $curso->nombre }}</div>
                        </td>
                        <td>
                            <span class="badge bg-warning bg-opacity-25 text-dark border border-warning fw-bold px-2 py-1">
                                {{ $curso->creditos }} créditos
                            </span>
                        </td>
                        <td>
                            @if($curso->docente)
                                <div class="text-dark">
                                    <i class="bi bi-person-badge text-muted me-1"></i> {{ $curso->docente->nombre_completo }}
                                </div>
                            @else
                                <span class="text-muted small fst-italic">Sin docente asignado</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info bg-opacity-10 text-info fw-semibold">
                                <i class="bi bi-clock me-1"></i> {{ $curso->horarios_count }} programados
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('cursos.show', $curso) }}" class="btn btn-outline-secondary" title="Ver Detalle">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar el curso {{ $curso->nombre }}?');">
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
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-book fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay cursos registrados en el catálogo.</p>
                            <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Registrar Primer Curso
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($cursos->hasPages())
        <div class="p-3 border-top d-flex justify-content-center">
            {{ $cursos->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
