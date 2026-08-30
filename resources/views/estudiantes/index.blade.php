<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
</head>
<body>

    <h1>Estudiantes</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('estudiantes.create') }}">
        Nuevo estudiante
    </a>

    <br><br>

    @if($estudiantes->count())

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($estudiantes as $estudiante)

                    <tr>

                        <td>
                            {{ $estudiante->id }}
                        </td>

                        <td>
                            {{ $estudiante->dni }}
                        </td>

                        <td>
                            {{ $estudiante->nombres }}
                        </td>

                        <td>
                            {{ $estudiante->apellidos }}
                        </td>

                        <td>
                            {{ $estudiante->carrera->nombre ?? 'N/A' }}
                        </td>

                        <td>

                            <a href="{{ route('estudiantes.show', $estudiante) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route('estudiantes.edit', $estudiante) }}">
                                Editar
                            </a>

                            |

                            <form
                                action="{{ route('estudiantes.destroy', $estudiante) }}"
                                method="POST"
                                style="display:inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('¿Eliminar este estudiante?')"
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

        {{ $estudiantes->links() }}

    @else

        <p>No hay estudiantes registrados.</p>

    @endif

</body>
</html>