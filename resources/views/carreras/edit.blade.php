@extends('layouts.app')

@section('title', 'Editar Carrera - ' . $carrera->nombre)

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-pencil-square text-danger"></i> Editar Carrera Profesional
        </h1>
        <p class="page-subtitle">
            Modifica la denominación de la escuela profesional #{{ $carrera->id }}.
        </p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('carreras.show', $carrera) }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-eye me-1"></i> Ver Carrera
        </a>
        <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Volver a Carreras
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-mortarboard-fill text-danger"></i> Modificar Datos de la Carrera
                </h5>
                <span class="badge bg-secondary bg-opacity-10 text-secondary font-monospace">ID: #{{ $carrera->id }}</span>
            </div>
            <div class="p-4">
                <form action="{{ route('carreras.update', $carrera) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nombre" class="form-label">
                            <i class="bi bi-building text-muted me-1"></i> Nombre de la Carrera <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $carrera->nombre) }}"
                            maxlength="100"
                            required
                        >
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-check-lg me-1"></i> Actualizar Carrera
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection