@extends('layouts.app')

@section('title', 'Carreras Profesionales')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-mortarboard-fill text-danger"></i> Escuelas Profesionales y Carreras
        </h1>
        <p class="page-subtitle">
            Gestión de las escuelas académicas profesionales de la Universidad Nacional del Santa.
        </p>
    </div>
    <div>
        <a href="{{ route('carreras.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i> Nueva Carrera
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-list-ul text-danger"></i> Listado de Carreras Universitarias
        </h5>
        <span class="badge bg-secondary bg-opacity-10 text-secondary">
            Total: {{ $carreras->total() }} carreras
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Nombre de la Escuela Profesional / Carrera</th>
                    <th style="width: 150px;">Estudiantes</th>
                    <th class="text-end" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($carreras as $carrera)
                    <tr>
                        <td>
                            <span class="fw-bold text-muted">#{{ $carrera->id }}</span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark fs-6">{{ $carrera->nombre }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border fw-semibold">
                                <i class="bi bi-people-fill me-1 text-primary"></i> {{ $carrera->estudiantes_count }} alumnos
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('carreras.show', $carrera) }}" class="btn btn-outline-secondary" title="Ver detalle">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar la carrera {{ $carrera->nombre }}?');">
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
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-mortarboard fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay carreras registradas.</p>
                            <a href="{{ route('carreras.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Registrar Primera Carrera
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($carreras->hasPages())
        <div class="p-3 border-top d-flex justify-content-center">
            {{ $carreras->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
