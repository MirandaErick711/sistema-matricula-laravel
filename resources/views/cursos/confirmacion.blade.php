<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Curso registrado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<main class="container py-5">

    <div class="row justify-content-center">

        <div class="col-12 col-lg-8 col-xl-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body p-4 p-md-5">

                    <div class="mb-4">

                        <span class="badge text-bg-success mb-2">
                            Registro completado
                        </span>

                        <h1 class="h2 mb-2">
                            Curso registrado correctamente
                        </h1>

                        <p class="text-secondary mb-0">
                            Los datos del curso se han guardado correctamente en la base de datos.
                        </p>

                    </div>


                    <div class="alert alert-success" role="alert">

                        El curso
                        <strong>{{ $curso->nombre }}</strong>
                        ha sido registrado correctamente.

                    </div>


                    <dl class="row g-0 border rounded overflow-hidden mb-4">

                        <div class="col-12 d-flex flex-column flex-sm-row border-bottom">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Código
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->codigo }}
                            </dd>

                        </div>


                        <div class="col-12 d-flex flex-column flex-sm-row border-bottom">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Nombre
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->nombre }}
                            </dd>

                        </div>


                        <div class="col-12 d-flex flex-column flex-sm-row border-bottom">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Horas de teoría
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->horas_teoria }}
                            </dd>

                        </div>


                        <div class="col-12 d-flex flex-column flex-sm-row border-bottom">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Horas de práctica
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->horas_practica }}
                            </dd>

                        </div>


                        <div class="col-12 d-flex flex-column flex-sm-row border-bottom">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Docente
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->docente }}
                            </dd>

                        </div>


                        <div class="col-12 d-flex flex-column flex-sm-row border-bottom">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Aula
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->aula }}
                            </dd>

                        </div>


                        <div class="col-12 d-flex flex-column flex-sm-row">

                            <dt class="col-sm-4 bg-light px-3 py-3 mb-0 fw-semibold">
                                Créditos
                            </dt>

                            <dd class="col-sm-8 px-3 py-3 mb-0">
                                {{ $curso->creditos }}
                            </dd>

                        </div>

                    </dl>


                    <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

                        <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

                            <a
                                href="{{ route('cursos.crear') }}"
                                class="btn btn-primary"
                            >
                                Registrar otro curso
                            </a>

                        </div>

                        <a
                            href="{{ route('cursos.index') }}"
                            class="btn btn-primary"
                        >
                            Ver cursos
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

</body>
</html>