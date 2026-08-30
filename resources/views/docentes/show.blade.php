<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $docente->nombres }} {{ $docente->apellidos }}</title>
</head>
<body>

    <h1>
        {{ $docente->nombres }}
        {{ $docente->apellidos }}
    </h1>

    <p>
        <strong>ID:</strong>
        {{ $docente->id }}
    </p>

    <h2>Grupos asignados</h2>

    @forelse($docente->grupos as $grupo)

        <p>
            Grupo {{ $grupo->nombre }}
        </p>

    @empty

        <p>
            Este docente todavía no tiene grupos asignados.
        </p>

    @endforelse

    <br>

    <a href="{{ route('docentes.edit', $docente) }}">
        Editar
    </a>

    |

    <a href="{{ route('docentes.index') }}">
        Volver
    </a>

</body>
</html>