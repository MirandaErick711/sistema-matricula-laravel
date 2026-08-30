<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Carrera</title>
</head>
<body>

    <h1>Nueva Carrera</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form action="{{ route('carreras.store') }}" method="POST">

        @csrf

        <label for="nombre">
            Nombre de la carrera:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre') }}"
            maxlength="100"
            required
        >

        <br><br>

        <button type="submit">
            Guardar
        </button>

        <a href="{{ route('carreras.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>