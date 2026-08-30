<h1>{{ $curso->nombre }}</h1>
<p><strong>Créditos:</strong> {{ $curso->creditos }}</p>
<p><strong>Docente:</strong> {{ $curso->docente->nombres }} {{ $curso->docente->apellidos }}</p>
<p><strong>Aula:</strong> {{ $curso->aula->nombre }}</p>

<h3>Prerrequisitos:</h3>
<ul>
    @forelse($curso->prerrequisitos as $pre)
        <li>{{ $pre->nombre }}</li>
    @empty
        <li>Sin prerrequisitos</li>
    @endforelse
</ul>

<a href="{{ route('cursos.index') }}">Volver</a>