@extends('layouts.app')

@section('title', 'Nueva Aula')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-door-open-fill text-danger"></i> Registrar Nueva Aula
        </h1>
        <p class="page-subtitle">
            Ingresa el nombre o código del aula y su capacidad máxima de estudiantes.
        </p>
    </div>
    <a href="{{ route('aulas.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-building text-danger"></i> Datos del Aula
                </h5>
            </div>
            <div class="p-4">
                <form action="{{ route('aulas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre / Código del Aula <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Aula 101, Lab. Sistemas" maxlength="50" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="capacidad" class="form-label">Capacidad de Aforo (Estudiantes) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('capacidad') is-invalid @enderror" id="capacidad" name="capacidad" value="{{ old('capacidad', 30) }}" min="1" required>
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('aulas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-save-fill me-1"></i> Guardar Aula
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
