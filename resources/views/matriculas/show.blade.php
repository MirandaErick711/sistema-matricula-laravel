<a href="{{ route(
    'detalle-matricula.create',
    $matricula
) }}">
    Agregar cursos
</a>
<h3>
    Cursos matriculados
</h3>

<ul>

@forelse($matricula->detalles as $detalle)

    <li>

        {{ $detalle->grupo->curso->nombre }}

        -
        
        Grupo {{ $detalle->grupo->nombre }}

        <form
            action="{{ route(
                'detalle-matricula.destroy',
                [
                    $matricula,
                    $detalle
                ]
            ) }}"
            method="POST"
            style="display:inline"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm(
                    '¿Retirar este grupo?'
                )"
            >
                Retirar
            </button>

        </form>

    </li>

@empty

    <li>
        No hay cursos matriculados.
    </li>

@endforelse

</ul>