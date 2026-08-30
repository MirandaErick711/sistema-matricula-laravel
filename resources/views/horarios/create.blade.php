<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Horario</title>
</head>

<body>

<h1>Nuevo Horario</h1>

@if($errors->any())

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif

<form action="{{ route('horarios.store') }}" method="POST">

    @csrf

    <label>Grupo:</label>

    <select name="grupo_id" required>

        <option value="">
            Seleccione un grupo
        </option>

        @foreach($grupos as $grupo)

            <option
                value="{{ $grupo->id }}"
                @selected(old('grupo_id') == $grupo->id)
            >
                {{ $grupo->curso->nombre }}
                -
                {{ $grupo->nombre }}
                -
                {{ $grupo->semestre->nombre }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Día:</label>

    <select name="dia" required>

        <option value="">Seleccione un día</option>

        @foreach([
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado'
        ] as $dia)

            <option
                value="{{ $dia }}"
                @selected(old('dia') == $dia)
            >
                {{ $dia }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Hora de inicio:</label>

    <input
        type="time"
        name="hora_inicio"
        value="{{ old('hora_inicio') }}"
        required
    >

    <br><br>

    <label>Hora de fin:</label>

    <input
        type="time"
        name="hora_fin"
        value="{{ old('hora_fin') }}"
        required
    >

    <br><br>

    <button type="submit">
        Guardar
    </button>

    <a href="{{ route('horarios.index') }}">
        Cancelar
    </a>

</form>

</body>
</html>