<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $curso->nombre }}</title>
</head>
<body>

    <h1>{{ $curso->nombre }}</h1>

    <p>
        <strong>ID:</strong>
        {{ $curso->id }}
    </p>

    <p>
        <strong>Créditos:</strong>
        {{ $curso->creditos }}
    </p>

    <hr>

    <h2>Carreras</h2>

    @forelse($curso->carreras as $carrera)

        <p>
            {{ $carrera->nombre }}
        </p>

    @empty

        <p>Este curso no está asignado a ninguna carrera.</p>

    @endforelse

    <hr>

    <h2>Prerrequisitos</h2>

    @forelse($curso->prerrequisitos as $prerrequisito)

        <p>
            {{ $prerrequisito->nombre }}
        </p>

    @empty

        <p>Este curso no tiene prerrequisitos.</p>

    @endforelse

    <hr>

    <h2>Grupos disponibles</h2>

    @forelse($curso->grupos as $grupo)

        <div>

            <h3>
                Grupo {{ $grupo->nombre }}
            </h3>

            <p>
                <strong>Semestre:</strong>
                {{ $grupo->semestre->nombre }}
            </p>

            <p>
                <strong>Docente:</strong>
                {{ $grupo->docente->nombres }}
                {{ $grupo->docente->apellidos }}
            </p>

            <p>
                <strong>Aula:</strong>
                {{ $grupo->aula->nombre }}
            </p>

            <h4>Horarios</h4>

            @forelse($grupo->horarios as $horario)

                <p>
                    {{ $horario->dia }}
                    -
                    {{ $horario->hora_inicio }}
                    a
                    {{ $horario->hora_fin }}
                </p>

            @empty

                <p>Sin horario asignado.</p>

            @endforelse

        </div>

        <hr>

    @empty

        <p>
            No hay grupos registrados para este curso.
        </p>

    @endforelse

    <br>
    <a href="{{ route('cursos.edit', $curso) }}">
        Editar curso
    </a>
    |
    <a href="{{ route('cursos.index') }}">
        Volver a cursos
    </a>
</body>
</html>