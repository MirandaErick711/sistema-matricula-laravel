@extends('layouts.app')

@section('title', 'Editar Curso')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-pencil-square text-danger"></i> Editar Asignatura: {{ $curso->nombre }}
        </h1>
        <p class="page-subtitle">
            Modifica la información básica, código, créditos y docente asignado.
        </p>
    </div>
    <a href="{{ route('cursos.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver a Cursos
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-pencil-fill text-danger"></i> Editar Datos del Curso #{{ $curso->id }}
                </h5>
            </div>
            <div class="p-4">
                <form action="{{ route('cursos.update', $curso) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-3">
                        <!-- Código -->
                        <div class="col-md-4">
                            <label for="codigo" class="form-label">
                                <i class="bi bi-upc text-muted me-1"></i> Código del Curso <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control font-monospace @error('codigo') is-invalid @enderror"
                                id="codigo"
                                name="codigo"
                                value="{{ old('codigo', $curso->codigo) }}"
                                maxlength="20"
                                required
                            >
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre del curso -->
                        <div class="col-md-8">
                            <label for="nombre" class="form-label">
                                <i class="bi bi-fonts text-muted me-1"></i> Nombre de la Asignatura <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control @error('nombre') is-invalid @enderror"
                                id="nombre"
                                name="nombre"
                                value="{{ old('nombre', $curso->nombre) }}"
                                maxlength="150"
                                required
                            >
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <!-- Créditos -->
                        <div class="col-md-4">
                            <label for="creditos" class="form-label">
                                <i class="bi bi-award text-muted me-1"></i> Créditos Académicos <span class="text-danger">*</span>
                            </label>
                            <input
                                type="number"
                                class="form-control @error('creditos') is-invalid @enderror"
                                id="creditos"
                                name="creditos"
                                value="{{ old('creditos', $curso->creditos) }}"
                                min="1"
                                max="10"
                                required
                            >
                            @error('creditos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Docente -->
                        <div class="col-md-8">
                            <label for="docente_id" class="form-label">
                                <i class="bi bi-person-badge text-muted me-1"></i> Docente Responsable
                            </label>
                            <select class="form-select @error('docente_id') is-invalid @enderror" id="docente_id" name="docente_id">
                                <option value="">-- Sin docente asignado --</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}" @selected(old('docente_id', $curso->docente_id) == $docente->id)>
                                        {{ $docente->nombre_completo }}
                                    </option>
                                @endforeach
                            </select>
                            @error('docente_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('cursos.index') }}" class="btn btn-outline-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-check-circle-fill me-1"></i> Actualizar Asignatura
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
