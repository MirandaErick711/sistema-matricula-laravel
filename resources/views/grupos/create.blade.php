<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Grupo</title>
</head>

<body>

<h1>Nuevo Grupo</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('grupos.store') }}" method="POST">

    @csrf

    <label>Curso:</label>

    <select name="curso_id" required>

        <option value="">
            Seleccione un curso
        </option>

        @foreach($cursos as $curso)

            <option
                value="{{ $curso->id }}"
                @selected(old('curso_id') == $curso->id)
            >
                {{ $curso->nombre }}
            </option>

        @endforeach

    </select>

    <br><br>


    <label>Semestre:</label>

    <select name="semestre_id" required>

        <option value="">
            Seleccione un semestre
        </option>

        @foreach($semestres as $semestre)

            <option
                value="{{ $semestre->id }}"
                @selected(old('semestre_id') == $semestre->id)
            >
                {{ $semestre->nombre }}
            </option>

        @endforeach

    </select>

    <br><br>


    <label>Docente:</label>

    <select name="docente_id" required>

        <option value="">
            Seleccione un docente
        </option>

        @foreach($docentes as $docente)

            <option
                value="{{ $docente->id }}"
                @selected(old('docente_id') == $docente->id)
            >
                {{ $docente->apellidos }},
                {{ $docente->nombres }}
            </option>

        @endforeach

    </select>

    <br><br>


    <label>Aula:</label>

    <select name="aula_id" required>

        <option value="">
            Seleccione un aula
        </option>

        @foreach($aulas as $aula)

            <option
                value="{{ $aula->id }}"
                @selected(old('aula_id') == $aula->id)
            >
                {{ $aula->nombre }}
            </option>

        @endforeach

    </select>

    <br><br>


    <label>Nombre del grupo:</label>

    <input
        type="text"
        name="nombre"
        placeholder="Ej: Grupo A"
        value="{{ old('nombre') }}"
        required
    >

    <br><br>


    <label>Capacidad:</label>

    <input
        type="number"
        name="capacidad"
        min="1"
        value="{{ old('capacidad') }}"
        required
    >

    <br><br>


    <button type="submit">
        Guardar
    </button>

    <a href="{{ route('grupos.index') }}">
        Cancelar
    </a>

</form>

</body>
</html>