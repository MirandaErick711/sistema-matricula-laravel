<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras</title>
</head>
<body>

    <h1>Carreras</h1>

    @if(session('success'))
        <p>
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('carreras.create') }}">
        Nueva carrera
    </a>

    <br><br>

    @if($carreras->count())

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($carreras as $carrera)

                    <tr>
                        <td>
                            {{ $carrera->id }}
                        </td>

                        <td>
                            {{ $carrera->nombre }}
                        </td>

                        <td>

                            <a href="{{ route('carreras.show', $carrera) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route('carreras.edit', $carrera) }}">
                                Editar
                            </a>

                            |

                            <form
                                action="{{ route('carreras.destroy', $carrera) }}"
                                method="POST"
                                style="display:inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('¿Eliminar esta carrera?')"
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

        {{ $carreras->links() }}

    @else

        <p>No hay carreras registradas.</p>

    @endif

</body>
</html>