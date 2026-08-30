<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Grupos</title>
</head>

<body>

<h1>Grupos</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('grupos.create') }}">
    Nuevo grupo
</a>

<br><br>

<table border="1" cellpadding="8">

    <thead>

        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Semestre</th>
            <th>Grupo</th>
            <th>Docente</th>
            <th>Aula</th>
            <th>Capacidad</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>

        @forelse($grupos as $grupo)

            <tr>

                <td>
                    {{ $grupo->id }}
                </td>

                <td>
                    {{ $grupo->curso->nombre }}
                </td>

                <td>
                    {{ $grupo->semestre->nombre }}
                </td>

                <td>
                    {{ $grupo->nombre }}
                </td>

                <td>
                    {{ $grupo->docente->nombres }}
                    {{ $grupo->docente->apellidos }}
                </td>

                <td>
                    {{ $grupo->aula->nombre }}
                </td>

                <td>
                    {{ $grupo->capacidad }}
                </td>

                <td>

                    <a href="{{ route('grupos.show', $grupo) }}">
                        Ver
                    </a>

                    |

                    <a href="{{ route('grupos.edit', $grupo) }}">
                        Editar
                    </a>

                    |

                    <form
                        action="{{ route('grupos.destroy', $grupo) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('¿Eliminar este grupo?')"
                        >
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="8">
                    No hay grupos registrados.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<br>

{{ $grupos->links() }}

</body>
</html>