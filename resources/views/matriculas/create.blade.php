@extends('layouts.app')

@section('title', 'Nueva Matrícula')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-journal-plus text-danger"></i> Registrar Nueva Matrícula
        </h1>
        <p class="page-subtitle">
            Selecciona al estudiante, el periodo académico y la fecha de matrícula.
        </p>
    </div>
    <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-journal-bookmark text-danger"></i> Datos de la Matrícula
                </h5>
                <span class="text-muted small">Paso 1 de 2: Cabecera de Matrícula</span>
            </div>
            <div class="p-4">
                <form action="{{ route('matriculas.store') }}" method="POST">
                    @csrf

                    <!-- Estudiante -->
                    <div class="mb-3">
                        <label for="estudiante_id" class="form-label">
                            <i class="bi bi-person text-muted me-1"></i> Estudiante a Matricular <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('estudiante_id') is-invalid @enderror" id="estudiante_id" name="estudiante_id" required>
                            <option value="">-- Seleccionar Estudiante --</option>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" @selected(old('estudiante_id') == $estudiante->id)>
                                    {{ $estudiante->nombre_completo }} (DNI: {{ $estudiante->dni }}) - {{ $estudiante->carrera->nombre ?? '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('estudiante_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-4">
                        <!-- Semestre -->
                        <div class="col-md-4">
                            <label for="semestre" class="form-label">
                                <i class="bi bi-calendar3 text-muted me-1"></i> Semestre / Periodo <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('semestre') is-invalid @enderror" id="semestre" name="semestre" value="{{ old('semestre', '2026-I') }}" placeholder="Ej: 2026-I" required>
                            @error('semestre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-4">
                            <label for="fecha_matricula" class="form-label">
                                <i class="bi bi-calendar-event text-muted me-1"></i> Fecha de Matrícula <span class="text-danger">*</span>
                            </label>
                            <input type="date" class="form-control @error('fecha_matricula') is-invalid @enderror" id="fecha_matricula" name="fecha_matricula" value="{{ old('fecha_matricula', date('Y-m-d')) }}" required>
                            @error('fecha_matricula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Estado -->
                        <div class="col-md-4">
                            <label for="estado" class="form-label">
                                <i class="bi bi-check-circle text-muted me-1"></i> Estado Inicial <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                                <option value="Activa" @selected(old('estado', 'Activa') == 'Activa')>Activa</option>
                                <option value="Anulada" @selected(old('estado') == 'Anulada')>Anulada</option>
                                <option value="Finalizada" @selected(old('estado') == 'Finalizada')>Finalizada</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('matriculas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-arrow-right-circle-fill me-1"></i> Crear y Agregar Asignaturas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
