<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar persona</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <main class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            <div class="mb-4">
                                <span class="badge text-bg-primary mb-2">Nueva persona</span>
                                <h1 class="h2 mb-2">Registrar persona</h1>
                                <p class="text-secondary mb-0">Introduce los datos para continuar con la confirmación.</p>
                            </div>
 
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <h2 class="h6">Revisa los datos introducidos</h2>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
 
                            <form method="POST" action="{{ route('personas.guardar') }}" novalidate>
                                @csrf
 
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror" required>
                                        @error('nombre')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
 
                                    <div class="col-md-6">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input id="apellidos" name="apellidos" type="text" value="{{ old('apellidos') }}" class="form-control @error('apellidos') is-invalid @enderror" required>
                                        @error('apellidos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
 
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Correo electrónico</label>
                                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
 
                                    <div class="col-md-6">
                                        <label for="telefono" class="form-label">Teléfono <span class="text-secondary">(opcional)</span></label>
                                        <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" class="form-control @error('telefono') is-invalid @enderror">
                                        @error('telefono')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
 
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4">Guardar y continuar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>