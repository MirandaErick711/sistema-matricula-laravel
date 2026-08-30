<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <title>Matrículas</title>
</head>

<body>

<h1>Matrículas</h1>

@if(session('success'))

    <p>
        {{ session('success') }}
    </p>

@endif

<a href="{{ route('matriculas.create') }}">
    Nueva matrícula
</a>

<br><br>

<table border="1" cellpadding="8">

    <thead>

        <tr>

            <th>ID</th>
            <th>Estudiante</th>
            <th>DNI</th>
            <th>Semestre</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>

    </thead>

    <tbody>

        @forelse($matriculas as $matricula)

            <tr>

                <td>
                    {{ $matricula->id }}
                </td>

                <td>
                    {{ $matricula->estudiante->apellidos }},
                    {{ $matricula->estudiante->nombres }}
                </td>

                <td>
                    {{ $matricula->estudiante->dni }}
                </td>

                <td>
                    {{ $matricula->semestre->nombre }}
                </td>

                <td>
                    {{ $matricula->fecha_matricula->format('d/m/Y') }}
                </td>

                <td>
                    {{ $matricula->estado }}
                </td>

                <td>

                    <a href="{{ route(
                        'matriculas.show',
                        $matricula
                    ) }}">
                        Ver
                    </a>

                    |

                    <a href="{{ route(
                        'matriculas.edit',
                        $matricula
                    ) }}">
                        Editar
                    </a>

                    |

                    <form
                        action="{{ route(
                            'matriculas.destroy',
                            $matricula
                        ) }}"
                        method="POST"
                        style="display:inline"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm(
                                '¿Eliminar esta matrícula?'
                            )"
                        >
                            Eliminar
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7">
                    No hay matrículas registradas.
                </td>

            </tr>

        @endforelse

    </tbody>

</table>

<br>

{{ $matriculas->links() }}

</body>

</html>