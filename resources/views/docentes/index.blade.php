<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docentes</title>
</head>
<body>

    <h1>Docentes</h1>

    @if(session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('docentes.create') }}">
        Nuevo docente
    </a>

    <br><br>

    @if($docentes->count())

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($docentes as $docente)

                    <tr>
                        <td>
                            {{ $docente->id }}
                        </td>

                        <td>
                            {{ $docente->nombres }}
                        </td>

                        <td>
                            {{ $docente->apellidos }}
                        </td>

                        <td>

                            <a href="{{ route('docentes.show', $docente) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route('docentes.edit', $docente) }}">
                                Editar
                            </a>

                            |

                            <form
                                action="{{ route('docentes.destroy', $docente) }}"
                                method="POST"
                                style="display:inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('¿Eliminar este docente?')"
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

        {{ $docentes->links() }}

    @else

        <p>No hay docentes registrados.</p>

    @endif

</body>
</html>