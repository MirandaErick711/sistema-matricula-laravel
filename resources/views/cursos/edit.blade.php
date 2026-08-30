<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
</head>
<body>

    <h1>Editar Curso</h1>

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

    <form
        action="{{ route('cursos.update', $curso) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div>
            <label for="nombre">Nombre del curso:</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $curso->nombre) }}"
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
                value="{{ old('creditos', $curso->creditos) }}"
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
                                $curso->carreras->contains($carrera->id)
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

            @forelse($cursos as $cursoPrerequisito)
                <div>
                    <label>
                        <input
                            type="checkbox"
                            name="prerrequisitos[]"
                            value="{{ $cursoPrerequisito->id }}"

                            @checked(
                                $curso->prerrequisitos->contains(
                                    $cursoPrerequisito->id
                                )
                            )
                        >
                        {{ $cursoPrerequisito->nombre }}
                    </label>
                </div>

            @empty
                <p>No hay otros cursos registrados.</p>
            @endforelse

        </fieldset>

        <br>

        <button type="submit">
            Actualizar Curso
        </button>
        <a href="{{ route('cursos.index') }}">
            Cancelar
        </a>
    </form>
</body>
</html>