@extends('layouts.app')

@section('title', 'Padrón de Estudiantes')

@section('header')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
    <div>
        <h1 class="page-title">
            <i class="bi bi-people-fill text-danger"></i> Padrón Estudiantil
        </h1>
        <p class="page-subtitle">
            Administración de alumnos matriculables, DNI, datos de contacto y carrera profesional.
        </p>
    </div>


<div>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-uns">
        <i class="bi bi-plus-circle me-1"></i> Registrar Estudiante
    </a>
</div>


</div>
@endsection

@section('content')

<div class="card-uns border-top-uns">


{{-- Encabezado --}}
<div class="card-uns-header">
    <h5 class="card-uns-title">
        <i class="bi bi-people text-danger"></i> Estudiantes Registrados
    </h5>

    <span class="badge bg-secondary bg-opacity-10 text-secondary">
        Total: {{ $estudiantes->total() }} estudiantes
    </span>
</div>


{{-- Filtros --}}
<div class="p-3 border-bottom bg-light">

    <form method="GET" action="{{ route('estudiantes.index') }}">

        <div class="row g-3 align-items-end">

            {{-- Buscar --}}
            <div class="col-md-5">

                <label for="buscar" class="form-label">
                    Buscar estudiante
                </label>

                <input
                    type="text"
                    name="buscar"
                    id="buscar"
                    class="form-control"
                    placeholder="DNI, nombres o apellidos..."
                    value="{{ request('buscar') }}"
                >

            </div>


            {{-- Carrera --}}
            <div class="col-md-4">

                <label for="carrera_id" class="form-label">
                    Carrera / Escuela
                </label>

                <select
                    name="carrera_id"
                    id="carrera_id"
                    class="form-select"
                >

                    <option value="">
                        Todas las carreras
                    </option>

                    @foreach($carreras as $carrera)

                        <option
                            value="{{ $carrera->id }}"
                            {{ request('carrera_id') == $carrera->id ? 'selected' : '' }}
                        >
                            {{ $carrera->nombre }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Botones --}}
            <div class="col-md-3 d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-uns"
                >
                    <i class="bi bi-search me-1"></i>
                    Buscar
                </button>

                <a
                    href="{{ route('estudiantes.index') }}"
                    class="btn btn-outline-secondary"
                >
                    <i class="bi bi-x-circle me-1"></i>
                    Limpiar
                </a>

            </div>

        </div>

    </form>

</div>


{{-- Tabla --}}
<div class="table-responsive">

    <table class="table table-uns align-middle">

        <thead>

            <tr>
                <th style="width: 80px;">ID</th>
                <th style="width: 120px;">DNI</th>
                <th>Apellidos y Nombres</th>
                <th>Carrera / Escuela</th>
                <th>Correo Electrónico</th>
                <th class="text-end" style="width: 180px;">Acciones</th>
            </tr>

        </thead>

        <tbody>

            @forelse($estudiantes as $estudiante)

                <tr>

                    <td>
                        <span class="fw-bold text-muted">
                            #{{ $estudiante->id }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-light text-dark border font-monospace fw-bold">
                            {{ $estudiante->dni }}
                        </span>
                    </td>

                    <td>
                        <div class="fw-bold text-dark fs-6">
                            {{ $estudiante->nombre_completo }}
                        </div>
                    </td>

                    <td>

                        <span class="badge bg-success bg-opacity-10 text-success fw-semibold">

                            <i class="bi bi-mortarboard me-1"></i>

                            {{ $estudiante->carrera->nombre ?? 'N/A' }}

                        </span>

                    </td>

                    <td>

                        <span class="text-muted">

                            <i class="bi bi-envelope me-1"></i>

                            {{ $estudiante->email ?? 'N/A' }}

                        </span>

                    </td>

                    <td class="text-end">

                        <div
                            class="btn-group btn-group-sm"
                            role="group"
                        >

                            {{-- Ver --}}
                            <a
                                href="{{ route('estudiantes.show', $estudiante) }}"
                                class="btn btn-outline-secondary"
                                title="Ver detalle"
                            >
                                <i class="bi bi-eye-fill"></i>
                            </a>


                            {{-- Editar --}}
                            <a
                                href="{{ route('estudiantes.edit', $estudiante) }}"
                                class="btn btn-outline-primary"
                                title="Editar"
                            >
                                <i class="bi bi-pencil-fill"></i>
                            </a>


                            {{-- Eliminar --}}
                            <form
                                action="{{ route('estudiantes.destroy', $estudiante) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('¿Está seguro de eliminar al estudiante {{ $estudiante->nombre_completo }}?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-outline-danger"
                                    title="Eliminar"
                                >
                                    <i class="bi bi-trash-fill"></i>
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-5 text-muted"
                    >

                        <i class="bi bi-people fs-1 d-block mb-3 opacity-50"></i>

                        <p class="fs-6 mb-2">
                            No se encontraron estudiantes con los filtros seleccionados.
                        </p>

                        <a
                            href="{{ route('estudiantes.index') }}"
                            class="btn btn-sm btn-outline-secondary me-2"
                        >
                            <i class="bi bi-x-circle me-1"></i>
                            Limpiar filtros
                        </a>

                        <a
                            href="{{ route('estudiantes.create') }}"
                            class="btn btn-sm btn-uns"
                        >
                            <i class="bi bi-plus-circle me-1"></i>
                            Registrar Estudiante
                        </a>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- Paginación --}}
@if($estudiantes->hasPages())

    <div class="p-3 border-top d-flex justify-content-center">

        {{ $estudiantes->links('pagination::bootstrap-5') }}

    </div>

@endif

</div>

@endsection
