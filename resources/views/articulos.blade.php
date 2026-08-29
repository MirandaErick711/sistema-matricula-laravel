<!DOCTYPE html>
<html>
    <body>
        <h1>Vamos a leer al escritor {{ $nombre }}</h1>
        <ul>
            @foreach ($articulos as $articulo)
                <li>{{ $articulo }}</li>
            @endforeach
        </ul>
    </body>
</html>