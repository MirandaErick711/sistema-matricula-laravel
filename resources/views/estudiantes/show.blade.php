<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $estudiante->nombres }}</title>
</head>
<body>

    <h1>
        {{ $estudiante->nombres }}
        {{ $estudiante->apellidos }}
    </h1>

    <p>
        <strong>ID:</strong>
        {{ $estudiante->id }}
    </p>

    <p>
        <strong>DNI:</strong>
        {{ $estudiante->dni }}
    </p>

    <p>
        <strong>Carrera:</strong>
        {{ $estudiante->carrera->nombre ?? 'N/A' }}
    </p>

    <h2>Matrículas</h2>

    @forelse($estudiante->matriculas as $matricula)

        <p>
            Matrícula #{{ $matricula->id }}
        </p>

    @empty

        <p>
            El estudiante todavía no tiene matrículas.
        </p>

    @endforelse

    <br>

    <a href="{{ route('estudiantes.edit', $estudiante) }}">
        Editar
    </a>

    |

    <a href="{{ route('estudiantes.index') }}">
        Volver
    </a>

</body>
</html>