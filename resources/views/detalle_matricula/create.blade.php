<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>
        Agregar cursos a matrícula
    </title>
</head>

<body>

<h1>
    Agregar cursos
</h1>

<h2>
    Matrícula #{{ $matricula->id }}
</h2>

<p>
    <strong>Estudiante:</strong>
    {{ $matricula->estudiante->nombres }}
    {{ $matricula->estudiante->apellidos }}
</p>

<p>
    <strong>Semestre:</strong>
    {{ $matricula->semestre->nombre }}
</p>

@if($errors->any())

    <ul>

        @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

        @endforeach

    </ul>

@endif

<h3>Grupos disponibles</h3>

@forelse($grupos as $grupo)

    <div>

        <strong>
            {{ $grupo->curso->nombre }}
        </strong>

        <br>

        Grupo:
        {{ $grupo->nombre }}

        <br>

        Docente:
        {{ $grupo->docente->nombres }}
        {{ $grupo->docente->apellidos }}

        <br>

        Aula:
        {{ $grupo->aula->nombre }}

        <br>

        Capacidad:
        {{ $grupo->capacidad }}

        <br>

        Horarios:

        @forelse($grupo->horarios as $horario)

            <br>

            {{ $horario->dia }}
            {{ $horario->hora_inicio }}
            -
            {{ $horario->hora_fin }}

        @empty

            <br>
            Sin horario registrado.

        @endforelse

        <br><br>

        <form
            action="{{ route(
                'detalle-matricula.store',
                $matricula
            ) }}"
            method="POST"
        >

            @csrf

            <input
                type="hidden"
                name="grupo_id"
                value="{{ $grupo->id }}"
            >

            <button type="submit">
                Agregar grupo
            </button>

        </form>

    </div>

    <hr>

@empty

    <p>
        No existen grupos disponibles
        para este semestre.
    </p>

@endforelse

<br>

<a href="{{ route(
    'matriculas.show',
    $matricula
) }}">
    Volver a la matrícula
</a>

</body>

</html>