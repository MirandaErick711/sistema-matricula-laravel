<h1>Nuevo curso</h1>

<form action="{{ route('cursos.store') }}" method="POST">
    @csrf
    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}"><br>

    <label>Créditos</label>
    <input type="number" name="creditos" value="{{ old('creditos') }}"><br>

    <label>Docente</label>
    <select name="docente_id">
        @foreach($docentes as $docente)
            <option value="{{ $docente->id }}">{{ $docente->nombres }} {{ $docente->apellidos }}</option>
        @endforeach
    </select><br>

    <label>Aula</label>
    <select name="aula_id">
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
        @endforeach
    </select><br>

    <fieldset>
        <legend>Prerrequisitos</legend>
        @foreach($cursos as $c)
            <label>
                <input type="checkbox" name="prerrequisitos[]" value="{{ $c->id }}">
                {{ $c->nombre }}
            </label><br>
        @endforeach
    </fieldset>

    <button type="submit">Guardar</button>
</form>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif