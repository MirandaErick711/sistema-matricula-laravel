<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Semestre</title>
</head>
<body>

    <h1>Editar Semestre Académico</h1>

    @if($errors->any())

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    <form
        action="{{ route('semestres-academicos.update', $semestreAcademico) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label for="nombre">
            Nombre:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $semestreAcademico->nombre) }}"
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
            value="{{ old('fecha_inicio', $semestreAcademico->fecha_inicio->format('Y-m-d')) }}"
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
            value="{{ old('fecha_fin', $semestreAcademico->fecha_fin->format('Y-m-d')) }}"
            required
        >

        <br><br>

        <button type="submit">
            Actualizar
        </button>

        <a href="{{ route('semestres-academicos.index') }}">
            Cancelar
        </a>

    </form>

</body>
</html>