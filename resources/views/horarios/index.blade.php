@extends('layouts.app')

@section('title', 'Programación de Horarios')

@section('header')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-clock-fill text-danger"></i> Programación de Horarios Semanales
        </h1>
        <p class="page-subtitle">
            Distribución horaria por día, asignatura, docente y aula asignada.
        </p>
    </div>
    <div>
        <a href="{{ route('horarios.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i> Asignar Horario
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card-uns border-top-uns">
    <div class="card-uns-header">
        <h5 class="card-uns-title">
            <i class="bi bi-calendar-week text-danger"></i> Horarios Registrados
        </h5>
        <span class="badge bg-secondary bg-opacity-10 text-secondary">
            Total: {{ $horarios->total() }} horarios
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-uns align-middle">
            <thead>
                <tr>
                    <th style="width: 70px;">ID</th>
                    <th style="width: 120px;">Día</th>
                    <th style="width: 140px;">Horas</th>
                    <th>Asignatura</th>
                    <th>Docente</th>
                    <th>Aula / Ambiente</th>
                    <th class="text-end" style="width: 180px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($horarios as $horario)
                    <tr>
                        <td><span class="fw-bold text-muted">#{{ $horario->id }}</span></td>
                        <td>
                            @php
                                $diasColor = [
                                    'Lunes' => 'primary',
                                    'Martes' => 'success',
                                    'Miércoles' => 'warning text-dark',
                                    'Jueves' => 'info text-dark',
                                    'Viernes' => 'danger',
                                    'Sábado' => 'secondary',
                                ];
                                $color = $diasColor[$horario->dia] ?? 'dark';
                            @endphp
                            <span class="badge bg-{{ $color }} px-2 py-1 fw-bold">
                                {{ $horario->dia }}
                            </span>
                        </td>
                        <td>
                            <span class="font-monospace fw-semibold">
                                {{ substr($horario->hora_inicio, 0, 5) }} - {{ substr($horario->hora_fin, 0, 5) }}
                            </span>
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $horario->curso->nombre ?? 'N/A' }}</div>
                            <small class="text-muted font-monospace">{{ $horario->curso->codigo ?? '' }} ({{ $horario->curso->creditos ?? '' }} cr.)</small>
                        </td>
                        <td>
                            <div class="text-dark">{{ $horario->curso->docente->nombre_completo ?? 'Sin asignar' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                <i class="bi bi-door-closed me-1"></i>{{ $horario->aula->nombre ?? 'N/A' }}
                            </span>
                        </td>
                        <td class="text-end">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('horarios.show', $horario) }}" class="btn btn-outline-secondary" title="Ver detalle">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-outline-primary" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('horarios.destroy', $horario) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de eliminar este horario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Eliminar">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-clock fs-1 d-block mb-3 opacity-50"></i>
                            <p class="fs-6 mb-2">No hay horarios programados.</p>
                            <a href="{{ route('horarios.create') }}" class="btn btn-sm btn-uns">
                                <i class="bi bi-plus-circle me-1"></i> Asignar Primer Horario
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($horarios->hasPages())
        <div class="p-3 border-top d-flex justify-content-center">
            {{ $horarios->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
