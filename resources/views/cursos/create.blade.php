<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Curso</title>
</head>
<body>

    <h1>Nuevo Curso</h1>

    @if($errors->any())
        <div>
            <strong>Se encontraron los siguientes errores:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cursos.store') }}" method="POST">

        @csrf

        <div>
            <label for="nombre">Nombre del curso:</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"
                required
            >
        </div>

        <br>

        <div>
            <label for="creditos">Créditos:</label>

            <input
                type="number"
                id="creditos"
                name="creditos"
                value="{{ old('creditos') }}"
                min="1"
                required
            >
        </div>

        <br>

        <fieldset>
            <legend>Carreras</legend>

            @forelse($carreras as $carrera)

                <div>
                    <label>
                        <input
                            type="checkbox"
                            name="carreras[]"
                            value="{{ $carrera->id }}"
                            @checked(
                                in_array(
                                    $carrera->id,
                                    old('carreras', [])
                                )
                            )
                        >

                        {{ $carrera->nombre }}
                    </label>
                </div>

            @empty

                <p>No hay carreras registradas.</p>

            @endforelse

        </fieldset>

        <br>

        <fieldset>
            <legend>Prerrequisitos</legend>

            @forelse($cursos as $curso)

                <div>
                    <label>
                        <input
                            type="checkbox"
                            name="prerrequisitos[]"
                            value="{{ $curso->id }}"
                            @checked(
                                in_array(
                                    $curso->id,
                                    old('prerrequisitos', [])
                                )
                            )
                        >

                        {{ $curso->nombre }}
                    </label>
                </div>

            @empty

                <p>No hay otros cursos registrados.</p>

            @endforelse

        </fieldset>

        <br>

        <button type="submit">
            Guardar Curso
        </button>

        <a href="{{ route('cursos.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>