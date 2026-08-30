<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
</head>
<body>

    <h1>Editar Estudiante</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="{{ route('estudiantes.update', $estudiante) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label for="dni">
            DNI:
        </label>

        <input
            type="text"
            id="dni"
            name="dni"
            value="{{ old('dni', $estudiante->dni) }}"
            maxlength="8"
            minlength="8"
            required
        >

        <br><br>

        <label for="nombres">
            Nombres:
        </label>

        <input
            type="text"
            id="nombres"
            name="nombres"
            value="{{ old('nombres', $estudiante->nombres) }}"
            maxlength="100"
            required
        >

        <br><br>

        <label for="apellidos">
            Apellidos:
        </label>

        <input
            type="text"
            id="apellidos"
            name="apellidos"
            value="{{ old('apellidos', $estudiante->apellidos) }}"
            maxlength="100"
            required
        >

        <br><br>

        <label for="carrera_id">
            Carrera:
        </label>

        <select
            id="carrera_id"
            name="carrera_id"
            required
        >

            @foreach($carreras as $carrera)

                <option
                    value="{{ $carrera->id }}"
                    @selected(
                        old('carrera_id', $estudiante->carrera_id)
                        == $carrera->id
                    )
                >
                    {{ $carrera->nombre }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Actualizar
        </button>

        <a href="{{ route('estudiantes.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>