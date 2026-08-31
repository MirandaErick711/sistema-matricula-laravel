@extends('layouts.app')

@section('title', 'Asignar Horario')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-clock-history text-danger"></i> Programar Horario de Clase
        </h1>
        <p class="page-subtitle">
            Selecciona el curso, aula, día de la semana y horas de inicio y fin.
        </p>
    </div>
    <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Volver a Horarios
    </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card-uns border-top-uns">
            <div class="card-uns-header">
                <h5 class="card-uns-title">
                    <i class="bi bi-calendar-plus text-danger"></i> Formulario de Programación
                </h5>
                <span class="text-muted small">Campos obligatorios (*)</span>
            </div>
            <div class="p-4">
                <form action="{{ route('horarios.store') }}" method="POST">
                    @csrf

                    <div class="row g-3 mb-3">
                        <!-- Curso -->
                        <div class="col-md-6">
                            <label for="curso_id" class="form-label">
                                <i class="bi bi-book text-muted me-1"></i> Asignatura <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('curso_id') is-invalid @enderror" id="curso_id" name="curso_id" required>
                                <option value="">-- Selecciona el Curso --</option>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}" @selected(old('curso_id') == $curso->id)>
                                        {{ $curso->codigo }} - {{ $curso->nombre }} ({{ $curso->docente->nombre_completo ?? 'Sin docente' }})
                                    </option>
                                @endforeach
                            </select>
                            @error('curso_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Aula -->
                        <div class="col-md-6">
                            <label for="aula_id" class="form-label">
                                <i class="bi bi-door-open text-muted me-1"></i> Aula / Ambiente <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('aula_id') is-invalid @enderror" id="aula_id" name="aula_id" required>
                                <option value="">-- Selecciona el Aula --</option>
                                @foreach($aulas as $aula)
                                    <option value="{{ $aula->id }}" @selected(old('aula_id') == $aula->id)>
                                        {{ $aula->nombre }} (Capacidad: {{ $aula->capacidad }} est.)
                                    </option>
                                @endforeach
                            </select>
                            @error('aula_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <!-- Día -->
                        <div class="col-md-4">
                            <label for="dia" class="form-label">
                                <i class="bi bi-calendar-event text-muted me-1"></i> Día de la Semana <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('dia') is-invalid @enderror" id="dia" name="dia" required>
                                @foreach($dias as $dia)
                                    <option value="{{ $dia }}" @selected(old('dia') == $dia)>{{ $dia }}</option>
                                @endforeach
                            </select>
                            @error('dia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hora Inicio -->
                        <div class="col-md-4">
                            <label for="hora_inicio" class="form-label">
                                <i class="bi bi-clock text-muted me-1"></i> Hora de Inicio <span class="text-danger">*</span>
                            </label>
                            <input type="time" class="form-control @error('hora_inicio') is-invalid @enderror" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio', '08:00') }}" required>
                            @error('hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hora Fin -->
                        <div class="col-md-4">
                            <label for="hora_fin" class="form-label">
                                <i class="bi bi-clock-fill text-muted me-1"></i> Hora de Fin <span class="text-danger">*</span>
                            </label>
                            <input type="time" class="form-control @error('hora_fin') is-invalid @enderror" id="hora_fin" name="hora_fin" value="{{ old('hora_fin', '10:00') }}" required>
                            @error('hora_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-save-fill me-1"></i> Guardar Horario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
