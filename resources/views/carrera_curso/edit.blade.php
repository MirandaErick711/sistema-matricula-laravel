<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cursos de {{ $carrera->nombre }}</title>
</head>

<body>

    <h1>Asignar cursos</h1>

    <h2>{{ $carrera->nombre }}</h2>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="{{ route('carreras.cursos.update', $carrera) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <fieldset>

            <legend>Cursos de la carrera</legend>

            @forelse($cursos as $curso)

                <div>

                    <label>

                        <input
                            type="checkbox"
                            name="cursos[]"
                            value="{{ $curso->id }}"

                            @checked(
                                $carrera->cursos->contains($curso->id)
                            )
                        >

                        {{ $curso->nombre }}

                        ({{ $curso->creditos }} créditos)

                    </label>

                </div>

            @empty

                <p>
                    No existen cursos registrados.
                </p>

            @endforelse

        </fieldset>

        <br>

        <button type="submit">
            Guardar cursos
        </button>

        <a href="{{ route('carreras.show', $carrera) }}">
            Cancelar
        </a>

    </form>

</body>
</html>