<h1>Cursos</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<a href="{{ route('cursos.create') }}">Nuevo curso</a>

<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Créditos</th><th>Docente</th><th>Aula</th><th>Acciones</th>
    </tr>
    @foreach($cursos as $curso)
    <tr>
        <td>{{ $curso->id }}</td>
        <td>{{ $curso->nombre }}</td>
        <td>{{ $curso->creditos }}</td>
        <td>{{ $curso->docente->nombres ?? 'N/A' }} {{ $curso->docente->apellidos ?? '' }}</td>
        <td>{{ $curso->aula->nombre ?? 'N/A' }}</td>
        <td>
            <a href="{{ route('cursos.show', $curso) }}">Ver</a>
            <a href="{{ route('cursos.edit', $curso) }}">Editar</a>
            <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('¿Eliminar curso?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $cursos->links() }}