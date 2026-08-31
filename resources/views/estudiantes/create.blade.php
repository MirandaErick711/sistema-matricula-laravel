@extends('layouts.app')

@section('title', 'Registrar Estudiante')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-person-plus-fill text-danger"></i> Registrar Nuevo Estudiante
        </h1>
        <p class="page-subtitle">
            Ingresa los datos personales, DNI y escuela profesional del alumno.
        </p>
    </div>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary btn-sm">
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
                    <i class="bi bi-file-earmark-person text-danger"></i> Formulario de Estudiante
                </h5>
                <span class="text-muted small">Campos obligatorios (*)</span>
            </div>
            <div class="p-4">
                <form action="{{ route('estudiantes.store') }}" method="POST">
                    @csrf

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{ old('nombres') }}" maxlength="100" required>
                            @error('nombres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" maxlength="100" required>
                            @error('apellidos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="dni" class="form-label">DNI (8 dígitos) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-monospace @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}" maxlength="8" placeholder="12345678" required>
                            @error('dni')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" maxlength="100" placeholder="alumno@uns.edu.pe">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="carrera_id" class="form-label">Escuela Profesional / Carrera <span class="text-danger">*</span></label>
                        <select class="form-select @error('carrera_id') is-invalid @enderror" id="carrera_id" name="carrera_id" required>
                            <option value="">-- Seleccionar Carrera --</option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}" @selected(old('carrera_id') == $carrera->id)>
                                    {{ $carrera->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('carrera_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-save-fill me-1"></i> Guardar Estudiante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
