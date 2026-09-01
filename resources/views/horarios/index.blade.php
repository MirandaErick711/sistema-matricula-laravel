@extends('layouts.app')

@section('title', 'Programación de Horarios')

@section('header')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

    <div>

        <h1 class="page-title">
            <i class="bi bi-clock-fill text-danger"></i>
            Programación de Horarios Semanales
        </h1>

        <p class="page-subtitle">
            Distribución horaria por día, asignatura, docente y aula asignada.
        </p>

    </div>

    <div>
        <a href="{{ route('horarios.create') }}" class="btn btn-uns">
            <i class="bi bi-plus-circle me-1"></i>
            Asignar Horario
        </a>
    </div>

</div>

@endsection


@section('content')

<!-- ========================================================= -->
<!-- SECCIÓN 1: PANEL DE FILTROS -->
<!-- ========================================================= -->

<div class="card-uns border-top-uns mb-4">

    <div class="card-body px-3 px-md-4 py-4">

        <form action="{{ route('horarios.index') }}" method="GET">

            <h6 class="mb-4 px-2 text-danger fw-bold">
                <i class="bi bi-funnel"></i>
                Consultar Calendario Específico
            </h6>

            <!-- Contenedor centrado del filtro -->
            <div class="filtro-contenido">
                <div class="row justify-content-center align-items-end g-2">

                    <!-- BOTONES RADIO -->
                    <div class="col-md-3">
                        <div class="d-flex gap-3 align-items-center mb-2">
                            <div class="form-check mb-0">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="tipo_filtro"
                                    id="filtro_aula"
                                    value="aula"
                                    checked
                                    onchange="toggleFiltros()"
                                >
                                <label
                                    class="form-check-label"
                                    for="filtro_aula"
                                >
                                    Por Aula
                                </label>
                            </div>

                            <div class="form-check mb-0">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="tipo_filtro"
                                    id="filtro_docente"
                                    value="docente"
                                    onchange="toggleFiltros()"
                                >
                                <label
                                    class="form-check-label"
                                    for="filtro_docente"
                                >
                                    Por Docente
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- SELECT DE AULA -->
                    <div
                        class="col-md-3"
                        id="div_aula"
                    >
                        <select
                            name="aula_id"
                            class="form-select"
                        >
                            <option value="">
                                -- Seleccionar Aula --
                            </option>

                            @foreach($aulas as $aula)
                                <option
                                    value="{{ $aula->id }}"
                                    {{ request('aula_id') == $aula->id ? 'selected' : '' }}
                                >
                                    {{ $aula->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- SELECT DE DOCENTE -->
                    <div
                        class="col-md-3"
                        id="div_docente"
                        style="display: none;"
                    >
                        <select
                            name="docente_id"
                            class="form-select"
                        >
                            <option value="">
                                -- Seleccionar Docente --
                            </option>

                            @foreach($docentes as $docente)
                                <option
                                    value="{{ $docente->id }}"
                                    {{ request('docente_id') == $docente->id ? 'selected' : '' }}
                                >
                                    {{ $docente->nombre_completo ?? 'Docente #'.$docente->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- BOTONES -->
                    <div class="col-md-3 d-flex gap-2">
                        <button
                            type="submit"
                            class="btn btn-uns flex-grow-1"
                        >
                            <i class="bi bi-calendar-check me-1"></i>
                            Generar Calendario
                        </button>

                        @if($modoCalendario)
                            <a
                                href="{{ route('horarios.index') }}"
                                class="btn btn-outline-secondary"
                                title="Limpiar Filtros"
                            >
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif
                    </div>

                </div>
            </div>

        </form>

    </div>

</div>


<!-- ========================================================= -->
<!-- SECCIÓN 2: RENDERIZADO CONDICIONAL -->
<!-- ========================================================= -->

@if($modoCalendario)

    <!-- ========================================================= -->
    <!-- VISTA DE CALENDARIO SEMANAL -->
    <!-- ========================================================= -->

    <div class="row g-3">

        @foreach(['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'] as $dia)

            <div class="col-md-4 col-lg-2">

                <div class="card shadow-sm h-100">

                    <div class="card-header bg-danger text-white text-center py-2 fw-bold">
                        {{ $dia }}
                    </div>


                    <div class="card-body p-2 bg-light">

                        @php

                            $horariosDia = $horarios->where('dia', $dia);

                        @endphp


                        @forelse($horariosDia as $hor)

                            <div class="card mb-2 border-0 border-start border-4 border-danger shadow-sm">

                                <div class="card-body p-2">

                                    <small class="fw-bold d-block text-danger mb-1">

                                        <i class="bi bi-clock"></i>

                                        {{ substr($hor->hora_inicio, 0, 5) }}
                                        -
                                        {{ substr($hor->hora_fin, 0, 5) }}

                                    </small>


                                    <span
                                        class="fw-bold d-block lh-sm"
                                        style="font-size: 0.85rem;"
                                    >

                                        {{ $hor->curso->nombre ?? 'N/A' }}

                                    </span>


                                    <small
                                        class="d-block text-secondary mt-1"
                                        style="font-size: 0.75rem;"
                                    >

                                        @if(request()->filled('aula_id'))

                                            <i class="bi bi-person-fill"></i>

                                            {{ $hor->curso->docente->nombre_completo ?? 'Sin asignar' }}

                                        @else

                                            <i class="bi bi-door-closed-fill"></i>

                                            {{ $hor->aula->nombre ?? 'Sin asignar' }}

                                        @endif

                                    </small>

                                </div>

                            </div>

                        @empty

                            <div class="text-center p-3 text-muted border border-dashed rounded mt-2">

                                <small>
                                    Libre
                                </small>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>

        @endforeach

    </div>


@else

    <!-- ========================================================= -->
    <!-- VISTA DE TABLA GENERAL PAGINADA -->
    <!-- ========================================================= -->

    <div class="card-uns border-top-uns">

        <div class="card-uns-header">

            <h5 class="card-uns-title">

                <i class="bi bi-calendar-week text-danger"></i>

                Horarios Registrados

            </h5>


            <span class="badge bg-secondary bg-opacity-10 text-secondary">

                Total: {{ $horarios->total() }} horarios

            </span>

        </div>


        <div class="table-responsive">

            <table class="table table-uns align-middle">

                <thead>

                    <tr>

                        <th style="width: 70px;">
                            ID
                        </th>

                        <th style="width: 120px;">
                            Día
                        </th>

                        <th style="width: 140px;">
                            Horas
                        </th>

                        <th>
                            Asignatura
                        </th>

                        <th>
                            Docente
                        </th>

                        <th>
                            Aula / Ambiente
                        </th>

                        <th
                            class="text-end"
                            style="width: 180px;"
                        >
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($horarios as $horario)

                        <tr>

                            <td>

                                <span class="fw-bold text-muted">
                                    #{{ $horario->id }}
                                </span>

                            </td>


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


                                <span
                                    class="badge bg-{{ $color }} px-2 py-1 fw-bold"
                                >

                                    {{ $horario->dia }}

                                </span>

                            </td>


                            <td>

                                <span class="font-monospace fw-semibold">

                                    {{ substr($horario->hora_inicio, 0, 5) }}

                                    -

                                    {{ substr($horario->hora_fin, 0, 5) }}

                                </span>

                            </td>


                            <td>

                                <div class="fw-bold text-dark">

                                    {{ $horario->curso->nombre ?? 'N/A' }}

                                </div>


                                <small class="text-muted font-monospace">

                                    {{ $horario->curso->codigo ?? '' }}

                                    ({{ $horario->curso->creditos ?? '' }} cr.)

                                </small>

                            </td>


                            <td>

                                <div class="text-dark">

                                    {{ $horario->curso->docente->nombre_completo ?? 'Sin asignar' }}

                                </div>

                            </td>


                            <td>

                                <span class="badge bg-light text-dark border">

                                    <i class="bi bi-door-closed me-1"></i>

                                    {{ $horario->aula->nombre ?? 'N/A' }}

                                </span>

                            </td>


                            <td class="text-end">

                                <div
                                    class="btn-group btn-group-sm"
                                    role="group"
                                >

                                    <a
                                        href="{{ route('horarios.show', $horario) }}"
                                        class="btn btn-outline-secondary"
                                        title="Ver detalle"
                                    >

                                        <i class="bi bi-eye-fill"></i>

                                    </a>


                                    <a
                                        href="{{ route('horarios.edit', $horario) }}"
                                        class="btn btn-outline-primary"
                                        title="Editar"
                                    >

                                        <i class="bi bi-pencil-fill"></i>

                                    </a>


                                    <form
                                        action="{{ route('horarios.destroy', $horario) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('¿Está seguro de eliminar este horario?');"
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
                                colspan="7"
                                class="text-center py-5 text-muted"
                            >

                                <i
                                    class="bi bi-clock fs-1 d-block mb-3 opacity-50"
                                ></i>


                                <p class="fs-6 mb-2">

                                    No hay horarios programados.

                                </p>


                                <a
                                    href="{{ route('horarios.create') }}"
                                    class="btn btn-sm btn-uns"
                                >

                                    <i class="bi bi-plus-circle me-1"></i>

                                    Asignar Primer Horario

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

@endif


<!-- ========================================================= -->
<!-- SCRIPT PARA EL CAMBIO DE FILTROS -->
<!-- ========================================================= -->

<script>

    function toggleFiltros() {

        const esAula =
            document.getElementById('filtro_aula').checked;

        const divAula =
            document.getElementById('div_aula');

        const divDocente =
            document.getElementById('div_docente');

        const selectAula =
            divAula.querySelector('select');

        const selectDocente =
            divDocente.querySelector('select');


        if (esAula) {

            divAula.style.display = 'block';

            divDocente.style.display = 'none';

            selectDocente.value = '';

        } else {

            divAula.style.display = 'none';

            divDocente.style.display = 'block';

            selectAula.value = '';

        }

    }


    // Al recargar la página, mantener la pestaña correcta
    // si se filtró por docente.

    document.addEventListener("DOMContentLoaded", function() {

        if ("{{ request()->filled('docente_id') }}") {

            document.getElementById('filtro_docente').checked = true;

            toggleFiltros();

        }

    });

</script>


<!-- ========================================================= -->
<!-- AJUSTE VISUAL DEL PANEL DE FILTROS -->
<!-- ========================================================= -->

<style>
    .card-uns .card-body {
        padding-left: 32px !important;
        padding-right: 32px !important;
    }

    .filtro-contenido {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 15px;
    }

    .filtro-contenido .row {
        margin-left: 0;
        margin-right: 0;
    }

    @media (max-width: 767.98px) {
        .card-uns .card-body {
            padding-left: 20px !important;
            padding-right: 20px !important;
        }

        .filtro-contenido {
            padding: 0;
        }
    }
</style>

@endsection