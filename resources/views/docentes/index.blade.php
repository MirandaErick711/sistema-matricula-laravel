@extends('layouts.app')

@section('title', 'Plana Docente')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-person-badge-fill text-danger"></i> Cuerpo Docente Universitario
        </h1>
        <p class="page-subtitle">
            Administración de profesores, asignaturas dictadas y contacto académico.
        </p>
    </div>
    <div>
        <a href="{{ route('docentes.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Docente
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-people text-danger"></i> Listado de Docentes
        </h5>
        <span class="badge bg-secondary bg-opacity-10 text-secondary">
            Total: {{ $docentes->total() }} docentes
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Apellidos y Nombres</th>
                    <th>Correo Institucional</th>
                    <th style="width: 140px;">Cursos a Cargo</th>
                    <th class="text-end" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($docentes as $docente)
                    <tr>
                        <td><span class="fw-bold text-muted">#{{ $docente->id }}</span></td>
                        <td>
                            <div class="fw-bold text-dark fs-6">{{ $docente->nombre_completo }}</div>
                        </td>
                        <td>
                            <span class="text-muted"><i class="bi bi-envelope me-1"></i>{{ $docente->email ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-danger bg-opacity-10 text-danger fw-semibold">
                                <i class="bi bi-book me-1"></i> {{ $docente->cursos_count }} asignaturas
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('docentes.show', $docente) }}" class="btn btn-outline-secondary" title="Ver detalle">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar al docente {{ $docente->nombre_completo }}?');">
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
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-person-badge fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay docentes registrados.</p>
                            <a href="{{ route('docentes.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Registrar Primer Docente
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($docentes->hasPages())
        <div class="p-3 border-top d-flex justify-content-center">
            {{ $docentes->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
