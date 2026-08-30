<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $semestreAcademico->nombre }}</title>
</head>
<body>

    <h1>{{ $semestreAcademico->nombre }}</h1>

    <p>
        <strong>ID:</strong>
        {{ $semestreAcademico->id }}
    </p>

    <p>
        <strong>Inicio:</strong>
        {{ $semestreAcademico->fecha_inicio->format('d/m/Y') }}
    </p>

    <p>
        <strong>Fin:</strong>
        {{ $semestreAcademico->fecha_fin->format('d/m/Y') }}
    </p>

    <h2>Grupos</h2>

    @forelse($semestreAcademico->grupos as $grupo)

        <p>
            {{ $grupo->nombre }}
        </p>

    @empty

        <p>
            No hay grupos registrados en este semestre.
        </p>

    @endforelse

    <h2>Matrículas</h2>

    @forelse($semestreAcademico->matriculas as $matricula)

        <p>
            Matrícula #{{ $matricula->id }}
        </p>

    @empty

        <p>
            No hay matrículas registradas en este semestre.
        </p>

    @endforelse

    <br>

    <a href="{{ route('semestres-academicos.edit', $semestreAcademico) }}">
        Editar
    </a>

    |

    <a href="{{ route('semestres-academicos.index') }}">
        Volver
    </a>

</body>
</html>