<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Nueva Matrícula</title>
</head>

<body>

<h1>Nueva Matrícula</h1>

@if($errors->any())

    <ul>

        @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

        @endforeach

    </ul>

@endif

<form
    action="{{ route('matriculas.store') }}"
    method="POST"
>

    @csrf

    <label>
        Estudiante:
    </label>

    <select
        name="estudiante_id"
        required
    >

        <option value="">
            Seleccione un estudiante
        </option>

        @foreach($estudiantes as $estudiante)

            <option
                value="{{ $estudiante->id }}"
                @selected(
                    old('estudiante_id')
                    == $estudiante->id
                )
            >

                {{ $estudiante->apellidos }},
                {{ $estudiante->nombres }}

                - DNI:
                {{ $estudiante->dni }}

            </option>

        @endforeach

    </select>

    <br><br>


    <label>
        Semestre:
    </label>

    <select
        name="semestre_id"
        required
    >

        <option value="">
            Seleccione un semestre
        </option>

        @foreach($semestres as $semestre)

            <option
                value="{{ $semestre->id }}"
                @selected(
                    old('semestre_id')
                    == $semestre->id
                )
            >

                {{ $semestre->nombre }}

            </option>

        @endforeach

    </select>

    <br><br>


    <label>
        Fecha de matrícula:
    </label>

    <input
        type="date"
        name="fecha_matricula"
        value="{{ old(
            'fecha_matricula',
            now()->format('Y-m-d')
        ) }}"
        required
    >

    <br><br>


    <label>
        Estado:
    </label>

    <select
        name="estado"
        required
    >

        <option value="Activa">
            Activa
        </option>

        <option value="Anulada">
            Anulada
        </option>

        <option value="Finalizada">
            Finalizada
        </option>

    </select>

    <br><br>


    <button type="submit">
        Crear matrícula
    </button>

    <a href="{{ route('matriculas.index') }}">
        Cancelar
    </a>

</form>

</body>

</html>