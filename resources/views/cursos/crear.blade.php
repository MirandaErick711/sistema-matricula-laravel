<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar curso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<main class="container py-5">

    <div class="row justify-content-center">

        <div class="col-12 col-lg-8 col-xl-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <div class="mb-4">

                        <span class="badge text-bg-primary mb-2">
                            Nuevo curso
                        </span>

                        <h1 class="h2 mb-2">
                            Registrar curso
                        </h1>

                        <p class="text-secondary mb-0">
                            Introduce los datos del curso para registrarlo en el sistema.
                        </p>

                    </div>

                    @if ($errors->any())

                        <div class="alert alert-danger" role="alert">

                            <h2 class="h6">
                                Revisa los datos introducidos
                            </h2>

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form method="POST"
                          action="{{ route('cursos.guardar') }}"
                          novalidate>

                        @csrf

                        <div class="row g-3">

                            <!-- Código -->

                            <div class="col-md-6">

                                <label for="codigo" class="form-label">
                                    Código
                                </label>

                                <input
                                    id="codigo"
                                    name="codigo"
                                    type="text"
                                    value="{{ old('codigo') }}"
                                    class="form-control @error('codigo') is-invalid @enderror"
                                    placeholder="Ej. SIS-101"
                                    required
                                >

                                @error('codigo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Nombre -->

                            <div class="col-md-6">

                                <label for="nombre" class="form-label">
                                    Nombre del curso
                                </label>

                                <input
                                    id="nombre"
                                    name="nombre"
                                    type="text"
                                    value="{{ old('nombre') }}"
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    placeholder="Ej. Ingeniería de Software"
                                    required
                                >

                                @error('nombre')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Horas teoría -->

                            <div class="col-md-6">

                                <label for="horas_teoria" class="form-label">
                                    Horas de teoría
                                </label>

                                <input
                                    id="horas_teoria"
                                    name="horas_teoria"
                                    type="number"
                                    min="0"
                                    value="{{ old('horas_teoria') }}"
                                    class="form-control @error('horas_teoria') is-invalid @enderror"
                                    required
                                >

                                @error('horas_teoria')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Horas práctica -->

                            <div class="col-md-6">

                                <label for="horas_practica" class="form-label">
                                    Horas de práctica
                                </label>

                                <input
                                    id="horas_practica"
                                    name="horas_practica"
                                    type="number"
                                    min="0"
                                    value="{{ old('horas_practica') }}"
                                    class="form-control @error('horas_practica') is-invalid @enderror"
                                    required
                                >

                                @error('horas_practica')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Docente -->

                            <div class="col-md-6">

                                <label for="docente" class="form-label">
                                    Docente
                                </label>

                                <input
                                    id="docente"
                                    name="docente"
                                    type="text"
                                    value="{{ old('docente') }}"
                                    class="form-control @error('docente') is-invalid @enderror"
                                    placeholder="Ej. Juan Pérez"
                                    required
                                >

                                @error('docente')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Aula -->

                            <div class="col-md-6">

                                <label for="aula" class="form-label">
                                    Aula
                                </label>

                                <input
                                    id="aula"
                                    name="aula"
                                    type="text"
                                    value="{{ old('aula') }}"
                                    class="form-control @error('aula') is-invalid @enderror"
                                    placeholder="Ej. A-201"
                                    required
                                >

                                @error('aula')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- Créditos -->

                            <div class="col-md-6">

                                <label for="creditos" class="form-label">
                                    Créditos
                                </label>

                                <input
                                    id="creditos"
                                    name="creditos"
                                    type="number"
                                    min="0"
                                    value="{{ old('creditos') }}"
                                    class="form-control @error('creditos') is-invalid @enderror"
                                    required
                                >

                                @error('creditos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a
                                    href="{{ url('/') }}"
                                    class="btn btn-outline-secondary px-4"
                                >
                                    Cancelar
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary px-4"
                                >
                                    Guardar curso
                                </button>
                            </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>

</body>
</html>