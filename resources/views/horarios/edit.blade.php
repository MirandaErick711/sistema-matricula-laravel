@extends('layouts.app')

@section('title', 'Editar Horario')

@section('header')
<div class="d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-pencil-square text-danger"></i> Editar Horario #{{ $horario->id }}
        </h1>
    </div>
    <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary btn-sm">
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
                    <i class="bi bi-pencil-fill text-danger"></i> Editar Programación
                </h5>
            </div>
            <div class="p-4">
                <form action="{{ route('horarios.update', $horario) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="curso_id" class="form-label">Asignatura <span class="text-danger">*</span></label>
                            <select class="form-select @error('curso_id') is-invalid @enderror" id="curso_id" name="curso_id" required>
                                @foreach($cursos as $curso)
                                    <option value="{{ $curso->id }}" @selected(old('curso_id', $horario->curso_id) == $curso->id)>
                                        {{ $curso->codigo }} - {{ $curso->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('curso_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="aula_id" class="form-label">Aula <span class="text-danger">*</span></label>
                            <select class="form-select @error('aula_id') is-invalid @enderror" id="aula_id" name="aula_id" required>
                                @foreach($aulas as $aula)
                                    <option value="{{ $aula->id }}" @selected(old('aula_id', $horario->aula_id) == $aula->id)>
                                        {{ $aula->nombre }} (Capacidad: {{ $aula->capacidad }})
                                    </option>
                                @endforeach
                            </select>
                            @error('aula_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label for="dia" class="form-label">Día <span class="text-danger">*</span></label>
                            <select class="form-select @error('dia') is-invalid @enderror" id="dia" name="dia" required>
                                @foreach($dias as $dia)
                                    <option value="{{ $dia }}" @selected(old('dia', $horario->dia) == $dia)>{{ $dia }}</option>
                                @endforeach
                            </select>
                            @error('dia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="hora_inicio" class="form-label">Hora Inicio <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('hora_inicio') is-invalid @enderror" id="hora_inicio" name="hora_inicio" value="{{ old('hora_inicio', substr($horario->hora_inicio, 0, 5)) }}" required>
                            @error('hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="hora_fin" class="form-label">Hora Fin <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('hora_fin') is-invalid @enderror" id="hora_fin" name="hora_fin" value="{{ old('hora_fin', substr($horario->hora_fin, 0, 5)) }}" required>
                            @error('hora_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('horarios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-uns px-4">
                            <i class="bi bi-check-circle-fill me-1"></i> Actualizar Horario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
