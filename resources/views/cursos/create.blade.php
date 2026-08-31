@extends('layouts.app')

@section('title', 'Nuevo Curso')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-book-half text-danger"></i> Registrar Nueva Asignatura
        </h1>
        <p class="page-subtitle">
            Ingresa el código, nombre, créditos y docente responsable de la asignatura.
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
                    <i class="bi bi-file-earmark-plus text-danger"></i> Formulario de Registro de Curso
                </h5>
                <span class="text-muted small">Campos obligatorios (*)</span>
            </div>
            <div class="p-4">
                <form action="{{ route('cursos.store') }}" method="POST">
                    @csrf

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
                                value="{{ old('codigo') }}"
                                maxlength="20"
                                placeholder="Ej: SIS-101"
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
                                value="{{ old('nombre') }}"
                                maxlength="150"
                                placeholder="Ej: Algoritmos y Estructuras de Datos"
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
                                value="{{ old('creditos', 4) }}"
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
                                    <option value="{{ $docente->id }}" @selected(old('docente_id') == $docente->id)>
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
                            <i class="bi bi-save-fill me-1"></i> Guardar Asignatura
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
