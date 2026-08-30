<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $aula->nombre }}</title>
</head>
<body>

    <h1>{{ $aula->nombre }}</h1>

    <p>
        <strong>ID:</strong>
        {{ $aula->id }}
    </p>

    <p>
        <strong>Capacidad:</strong>
        {{ $aula->capacidad }} estudiantes
    </p>

    <h2>Grupos asignados</h2>

    @forelse($aula->grupos as $grupo)

        <p>
            {{ $grupo->nombre }}
        </p>

    @empty

        <p>
            Esta aula todavía no tiene grupos asignados.
        </p>

    @endforelse

    <br>

    <a href="{{ route('aulas.edit', $aula) }}">
        Editar
    </a>

    |

    <a href="{{ route('aulas.index') }}">
        Volver
    </a>

</body>
</html>