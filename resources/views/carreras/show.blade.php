<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $carrera->nombre }}</title>
</head>
<body>

    <h1>{{ $carrera->nombre }}</h1>

    <p>
        <strong>ID:</strong>
        {{ $carrera->id }}
    </p>

    <h2>Cursos de la carrera</h2>

    @forelse($carrera->cursos as $curso)

        <p>
            {{ $curso->nombre }}
            — {{ $curso->creditos }} créditos
        </p>

    @empty

        <p>
            Esta carrera todavía no tiene cursos asignados.
        </p>

    @endforelse

    <br>

    <a href="{{ route('carreras.edit', $carrera) }}">
        Editar
    </a>

    |

    <a href="{{ route('carreras.index') }}">
        Volver
    </a>

</body>
</html>