<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Docente</title>
</head>
<body>

    <h1>Editar Docente</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="{{ route('docentes.update', $docente) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div>
            <label for="nombres">
                Nombres:
            </label>

            <input
                type="text"
                id="nombres"
                name="nombres"
                value="{{ old('nombres', $docente->nombres) }}"
                maxlength="100"
                required
            >
        </div>

        <br>

        <div>
            <label for="apellidos">
                Apellidos:
            </label>

            <input
                type="text"
                id="apellidos"
                name="apellidos"
                value="{{ old('apellidos', $docente->apellidos) }}"
                maxlength="100"
                required
            >
        </div>

        <br>

        <button type="submit">
            Actualizar
        </button>

        <a href="{{ route('docentes.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>