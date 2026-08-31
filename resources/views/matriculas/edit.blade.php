@extends('layouts.app')

@section('title', 'Editar Matrícula')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-pencil-square text-danger"></i> Editar Matrícula #{{ $matricula->id }}
        </h1>
    </div>
    <a href="{{ route('matriculas.show', $matricula) }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver a la Ficha
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-journal-text text-danger"></i> Modificar Datos de Matrícula
                </h5>
            </div>
            <div class="p-4">
                <form action="{{ route('matriculas.update', $matricula) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="estudiante_id" class="form-label">Estudiante <span class="text-danger">*</span></label>
                        <select class="form-select @error('estudiante_id') is-invalid @enderror" id="estudiante_id" name="estudiante_id" required>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" @selected(old('estudiante_id', $matricula->estudiante_id) == $estudiante->id)>
                                    {{ $estudiante->nombre_completo }} (DNI: {{ $estudiante->dni }})
                                </option>
                            @endforeach
                        </select>
                        @error('estudiante_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="semestre" class="form-label">Semestre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('semestre') is-invalid @enderror" id="semestre" name="semestre" value="{{ old('semestre', $matricula->semestre) }}" required>
                            @error('semestre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="fecha_matricula" class="form-label">Fecha <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('fecha_matricula') is-invalid @enderror" id="fecha_matricula" name="fecha_matricula" value="{{ old('fecha_matricula', $matricula->fecha_matricula ? $matricula->fecha_matricula->format('Y-m-d') : '') }}" required>
                            @error('fecha_matricula')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                            <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                                <option value="Activa" @selected(old('estado', $matricula->estado) == 'Activa')>Activa</option>
                                <option value="Anulada" @selected(old('estado', $matricula->estado) == 'Anulada')>Anulada</option>
                                <option value="Finalizada" @selected(old('estado', $matricula->estado) == 'Finalizada')>Finalizada</option>
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('matriculas.show', $matricula) }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-check-circle-fill me-1"></i> Actualizar Matrícula
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
