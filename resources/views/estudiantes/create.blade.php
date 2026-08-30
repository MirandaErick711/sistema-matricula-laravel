<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Estudiante</title>
</head>
<body>

    <h1>Nuevo Estudiante</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form action="{{ route('estudiantes.store') }}" method="POST">

        @csrf

        <label for="dni">
            DNI:
        </label>

        <input
            type="text"
            id="dni"
            name="dni"
            value="{{ old('dni') }}"
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
            value="{{ old('nombres') }}"
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
            value="{{ old('apellidos') }}"
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

            <option value="">
                Seleccione una carrera
            </option>

            @foreach($carreras as $carrera)

                <option
                    value="{{ $carrera->id }}"
                    @selected(old('carrera_id') == $carrera->id)
                >
                    {{ $carrera->nombre }}
                </option>

            @endforeach

        </select>

        <br><br>

        <button type="submit">
            Guardar
        </button>

        <a href="{{ route('estudiantes.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>