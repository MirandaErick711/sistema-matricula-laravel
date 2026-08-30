<form action="{{ route('cursos.update', $curso) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre</label>
    <input type="text" name="nombre" value="{{ $curso->nombre }}"><br>

    <label>Créditos</label>
    <input type="number" name="creditos" value="{{ $curso->creditos }}"><br>

    <label>Docente</label>
    <select name="docente_id">
        @foreach($docentes as $docente)
            <option value="{{ $docente->id }}" @selected($curso->docente_id == $docente->id)>
                {{ $docente->nombres }} {{ $docente->apellidos }}
            </option>
        @endforeach
    </select><br>

    <label>Aula</label>
    <select name="aula_id">
        @foreach($aulas as $aula)
            <option value="{{ $aula->id }}" @selected($curso->aula_id == $aula->id)>
                {{ $aula->nombre }}
            </option>
        @endforeach
    </select><br>

    <fieldset>
        <legend>Prerrequisitos</legend>
        @foreach($cursos as $c)
            <label>
                <input type="checkbox" name="prerrequisitos[]" value="{{ $c->id }}"
                    @checked($curso->prerrequisitos->contains($c->id))>
                {{ $c->nombre }}
            </label><br>
        @endforeach
    </fieldset>

    <button type="submit">Actualizar</button>
</form>