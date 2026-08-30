<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semestres Académicos</title>
</head>
<body>

    <h1>Semestres Académicos</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('semestres-academicos.create') }}">
        Nuevo semestre
    </a>

    <br><br>

    @if($semestres->count())

        <table border="1" cellpadding="8">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($semestres as $semestre)

                    <tr>

                        <td>
                            {{ $semestre->id }}
                        </td>

                        <td>
                            {{ $semestre->nombre }}
                        </td>

                        <td>
                            {{ $semestre->fecha_inicio->format('d/m/Y') }}
                        </td>

                        <td>
                            {{ $semestre->fecha_fin->format('d/m/Y') }}
                        </td>

                        <td>

                            <a href="{{ route('semestres-academicos.show', $semestre) }}">
                                Ver
                            </a>

                            |

                            <a href="{{ route('semestres-academicos.edit', $semestre) }}">
                                Editar
                            </a>

                            |

                            <form
                                action="{{ route('semestres-academicos.destroy', $semestre) }}"
                                method="POST"
                                style="display:inline"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('¿Eliminar este semestre?')"
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

        {{ $semestres->links() }}

    @else

        <p>No hay semestres registrados.</p>

    @endif

</body>
</html>