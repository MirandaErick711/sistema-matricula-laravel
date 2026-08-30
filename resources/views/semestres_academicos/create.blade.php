<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Semestre</title>
</head>
<body>

    <h1>Nuevo Semestre Académico</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="{{ route('semestres-academicos.store') }}"
        method="POST"
    >

        @csrf

        <label for="nombre">
            Nombre:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ej: 2026-II"
            value="{{ old('nombre') }}"
            maxlength="20"
            required
        >

        <br><br>

        <label for="fecha_inicio">
            Fecha de inicio:
        </label>

        <input
            type="date"
            id="fecha_inicio"
            name="fecha_inicio"
            value="{{ old('fecha_inicio') }}"
            required
        >

        <br><br>

        <label for="fecha_fin">
            Fecha de fin:
        </label>

        <input
            type="date"
            id="fecha_fin"
            name="fecha_fin"
            value="{{ old('fecha_fin') }}"
            required
        >

        <br><br>

        <button type="submit">
            Guardar
        </button>

        <a href="{{ route('semestres-academicos.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>