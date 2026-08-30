<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Horarios</title>
</head>

<body>

<h1>Horarios</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('horarios.create') }}">
    Nuevo horario
</a>

<br><br>

<table border="1" cellpadding="8">

    <thead>

        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Grupo</th>
            <th>Semestre</th>
            <th>Aula</th>
            <th>Día</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Acciones</th>
        </tr>

    </thead>

    <tbody>

        @forelse($horarios as $horario)

            <tr>

                <td>
                    {{ $horario->id }}
                </td>

                <td>
                    {{ $horario->grupo->curso->nombre }}
                </td>

                <td>
                    {{ $horario->grupo->nombre }}
                </td>

                <td>
                    {{ $horario->grupo->semestre->nombre }}
                </td>

                <td>
                    {{ $horario->grupo->aula->nombre }}
                </td>

                <td>
                    {{ $horario->dia }}
                </td>

                <td>
                    {{ $horario->hora_inicio }}
                </td>

                <td>
                    {{ $horario->hora_fin }}
                </td>

                <td>

                    <a href="{{ route('horarios.show', $horario) }}">
                        Ver
                    </a>

                    |

                    <a href="{{ route('horarios.edit', $horario) }}">
                        Editar
                    </a>

                    |

                    <form
                        action="{{ route('horarios.destroy', $horario) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('¿Eliminar este horario?')"
                        >
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="9">
                    No hay horarios registrados.
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

<br>

{{ $horarios->links() }}

</body>
</html>