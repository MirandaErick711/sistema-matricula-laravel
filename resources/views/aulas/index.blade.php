<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas</title>
</head>
<body>

    <h1>Aulas</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('aulas.create') }}">
        Nueva aula
    </a>

    <br><br>

    @if($aulas->count())

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Capacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($aulas as $aula)

                    <tr>

                        <td>
                            {{ $aula->id }}
                        </td>

                        <td>
                            {{ $aula->nombre }}
                        </td>

                        <td>
                            {{ $aula->capacidad }}
                        </td>

                        <td>

                            <a href="{{ route('aulas.show', $aula) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route('aulas.edit', $aula) }}">
                                Editar
                            </a>

                            |

                            <form
                                action="{{ route('aulas.destroy', $aula) }}"
                                method="POST"
                                style="display:inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('¿Eliminar esta aula?')"
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

        {{ $aulas->links() }}

    @else

        <p>No hay aulas registradas.</p>

    @endif

</body>
</html>