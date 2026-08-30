<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aula</title>
</head>
<body>

    <h1>Editar Aula</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="{{ route('aulas.update', $aula) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label for="nombre">
            Nombre del aula:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $aula->nombre) }}"
            maxlength="50"
            required
        >

        <br><br>

        <label for="capacidad">
            Capacidad:
        </label>

        <input
            type="number"
            id="capacidad"
            name="capacidad"
            value="{{ old('capacidad', $aula->capacidad) }}"
            min="1"
            required
        >

        <br><br>

        <button type="submit">
            Actualizar
        </button>

        <a href="{{ route('aulas.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>