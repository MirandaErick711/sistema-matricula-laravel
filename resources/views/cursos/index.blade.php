<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>

    <h1>Cursos</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('cursos.create') }}">Nuevo curso</a>

    <br><br>

    @if($cursos->count())

        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Créditos</th>
                    <th>Carreras</th>
                    <th>Prerrequisitos</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>

                        <td>{{ $curso->nombre }}</td>

                        <td>{{ $curso->creditos }}</td>

                        <td>
                            @forelse($curso->carreras as $carrera)
                                {{ $carrera->nombre }}<br>
                            @empty
                                Sin carrera asignada
                            @endforelse
                        </td>

                        <td>
                            @forelse($curso->prerrequisitos as $prerrequisito)
                                {{ $prerrequisito->nombre }}<br>
                            @empty
                                Sin prerrequisitos
                            @endforelse
                        </td>

                        <td>
                            <a href="{{ route('cursos.show', $curso) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route('cursos.edit', $curso) }}">
                                Editar
                            </a>

                            |

                            <form
                                action="{{ route('cursos.destroy', $curso) }}"
                                method="POST"
                                style="display:inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('¿Eliminar este curso?')"
                                >
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br>

        {{ $cursos->links() }}

    @else

        <p>No hay cursos registrados.</p>

    @endif

</body>
</html>