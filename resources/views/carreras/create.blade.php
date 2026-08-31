@extends('layouts.app')

@section('title', 'Nueva Carrera Profesional')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-mortarboard text-danger"></i> Registrar Carrera Profesional
        </h1>
        <p class="page-subtitle">
            Crea una nueva escuela académica profesional para la oferta educativa de la UNS.
        </p>
    </div>
    <a href="{{ route('carreras.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver a Carreras
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-mortarboard-fill text-danger"></i> Datos de la Carrera
                </h5>
                <span class="text-muted small">Campos obligatorios (*)</span>
            </div>
            <div class="p-4">
                <form action="{{ route('carreras.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nombre" class="form-label">
                            <i class="bi bi-building text-muted me-1"></i> Nombre de la Carrera / Escuela Profesional <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control @error('nombre') is-invalid @enderror"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre') }}"
                            maxlength="100"
                            placeholder="Ej: Ingeniería de Sistemas e Informática"
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
                            <i class="bi bi-save-fill me-1"></i> Guardar Carrera
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection