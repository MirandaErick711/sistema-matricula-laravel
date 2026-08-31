@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-pencil-square text-danger"></i> Editar Estudiante: {{ $estudiante->nombre_completo }}
        </h1>
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
                    <i class="bi bi-pencil-fill text-danger"></i> Editar Datos del Alumno #{{ $estudiante->id }}
                </h5>
            </div>
            <div class="p-4">
                <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nombres" class="form-label">Nombres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{ old('nombres', $estudiante->nombres) }}" maxlength="100" required>
                            @error('nombres')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos', $estudiante->apellidos) }}" maxlength="100" required>
                            @error('apellidos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="dni" class="form-label">DNI <span class="text-danger">*</span></label>
                            <input type="text" class="form-control font-monospace @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni', $estudiante->dni) }}" maxlength="8" required>
                            @error('dni')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $estudiante->email) }}" maxlength="100">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="carrera_id" class="form-label">Carrera <span class="text-danger">*</span></label>
                        <select class="form-select @error('carrera_id') is-invalid @enderror" id="carrera_id" name="carrera_id" required>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}" @selected(old('carrera_id', $estudiante->carrera_id) == $carrera->id)>
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
                            <i class="bi bi-check-circle-fill me-1"></i> Actualizar Estudiante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
