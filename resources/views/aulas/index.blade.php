@extends('layouts.app')

@section('title', 'Aulas y Ambientes')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-door-open-fill text-danger"></i> Aulas y Ambientes Académicos
        </h1>
        <p class="page-subtitle">
            Control de infraestructura física, capacidad de aforo y asignación de horarios.
        </p>
    </div>
    <div>
        <a href="{{ route('aulas.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i> Nueva Aula
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-building text-danger"></i> Listado de Aulas
        </h5>
        <span class="badge bg-secondary bg-opacity-10 text-secondary">
            Total: {{ $aulas->total() }} aulas
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Nombre / Código del Aula</th>
                    <th style="width: 150px;">Aforo / Capacidad</th>
                    <th style="width: 150px;">Horarios Asignados</th>
                    <th class="text-end" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aulas as $aula)
                    <tr>
                        <td><span class="fw-bold text-muted">#{{ $aula->id }}</span></td>
                        <td>
                            <div class="fw-bold text-dark fs-6">
                                <i class="bi bi-door-closed-fill text-muted me-2"></i>{{ $aula->nombre }}
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border px-3 py-1 fw-bold">
                                <i class="bi bi-people-fill text-muted me-1"></i>{{ $aula->capacidad }} estudiantes
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-info bg-opacity-10 text-info fw-semibold">
                                <i class="bi bi-clock me-1"></i>{{ $aula->horarios_count }} clases
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('aulas.show', $aula) }}" class="btn btn-outline-secondary" title="Ver detalle">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar el aula {{ $aula->nombre }}?');">
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
                            <i class="bi bi-door-open fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay aulas registradas.</p>
                            <a href="{{ route('aulas.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Registrar Primera Aula
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($aulas->hasPages())
        <div class="p-3 border-top d-flex justify-content-center">
            {{ $aulas->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
