<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistema de Matrícula') | Universidad Nacional del Santa</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo-uns.png') }}">

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons 1.11.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom UNS Styles -->
    <style>
        :root {
            --uns-primary: #800000;
            --uns-primary-dark: #5e0000;
            --uns-primary-light: #9c1818;
            --uns-primary-subtle: #fbf2f2;
            --uns-gold: #c59b27;
            --uns-gold-light: #f7eecf;
            --uns-dark: #1e293b;
            --uns-light-bg: #f4f6f9;
            --uns-card-border: #e2e8f0;
            --uns-text-muted: #64748b;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--uns-light-bg);
            color: var(--uns-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .uns-topbar {
            background-color: var(--uns-primary-dark);
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.82rem;
            padding: 0.35rem 0;
            border-bottom: 2px solid var(--uns-gold);
        }
        .uns-topbar a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.2s;
        }
        .uns-topbar a:hover {
            color: #ffffff;
        }

        /* Main Navbar */
        .uns-navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            padding: 0.6rem 0;
            border-bottom: 1px solid var(--uns-card-border);
        }
        .uns-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .uns-brand img {
            height: 48px;
            width: auto;
            object-fit: contain;
        }
        .uns-brand-title {
            font-weight: 800;
            font-size: 1.05rem;
            color: var(--uns-primary);
            letter-spacing: -0.2px;
            line-height: 1.15;
            text-transform: uppercase;
        }
        .uns-brand-subtitle {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--uns-text-muted);
            letter-spacing: 0.4px;
            text-transform: uppercase;
        }

        /* Nav links */
        .navbar-nav .nav-link {
            font-weight: 500;
            font-size: 0.88rem;
            color: #334155;
            padding: 0.45rem 0.75rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .navbar-nav .nav-link:hover {
            color: var(--uns-primary);
            background-color: var(--uns-primary-subtle);
        }
        .navbar-nav .nav-link.active {
            color: #ffffff !important;
            background-color: var(--uns-primary);
            font-weight: 600;
        }
        .navbar-nav .nav-link.active i {
            color: var(--uns-gold-light);
        }

        /* Buttons */
        .btn-uns {
            background-color: var(--uns-primary);
            border-color: var(--uns-primary);
            color: #ffffff;
            font-weight: 600;
            padding: 0.5rem 1.15rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(128, 0, 0, 0.2);
        }
        .btn-uns:hover, .btn-uns:focus {
            background-color: var(--uns-primary-dark);
            border-color: var(--uns-primary-dark);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(128, 0, 0, 0.3);
        }
        .btn-outline-uns {
            border-color: var(--uns-primary);
            color: var(--uns-primary);
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }
        .btn-outline-uns:hover {
            background-color: var(--uns-primary);
            border-color: var(--uns-primary);
            color: #ffffff;
        }

        /* Cards */
        .card-uns {
            background: #ffffff;
            border: 1px solid var(--uns-card-border);
            border-radius: 0.75rem;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-uns:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.07);
        }
        .card-uns-header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--uns-card-border);
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-uns-header.border-top-uns {
            border-top: 3.5px solid var(--uns-primary);
        }
        .card-uns-title {
            font-size: 1.08rem;
            font-weight: 700;
            color: var(--uns-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Page Headers */
        .page-header-uns {
            background: #ffffff;
            border-bottom: 1px solid var(--uns-card-border);
            padding: 1.35rem 0;
            margin-bottom: 1.5rem;
        }
        .page-title {
            font-size: 1.45rem;
            font-weight: 800;
            color: var(--uns-primary-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .page-subtitle {
            font-size: 0.85rem;
            color: var(--uns-text-muted);
            margin: 0.25rem 0 0 0;
        }

        /* Tables */
        .table-uns-wrapper {
            background: #ffffff;
            border: 1px solid var(--uns-card-border);
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }
        .table-uns {
            margin-bottom: 0;
        }
        .table-uns thead {
            background-color: #f8fafc;
            border-bottom: 2px solid var(--uns-card-border);
        }
        .table-uns thead th {
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #475569;
            padding: 0.85rem 1rem;
            vertical-align: middle;
            border-top: none;
        }
        .table-uns tbody td {
            padding: 0.9rem 1rem;
            vertical-align: middle;
            font-size: 0.9rem;
            border-color: #f1f5f9;
        }
        .table-uns tbody tr:hover {
            background-color: #fafbfd;
        }

        /* Badges */
        .badge-uns-activa {
            background-color: #d1fae5;
            color: #065f46;
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 2rem;
            font-size: 0.78rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .badge-uns-anulada {
            background-color: #fee2e2;
            color: #991b1b;
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 2rem;
            font-size: 0.78rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .badge-uns-finalizada {
            background-color: #e2e8f0;
            color: #334155;
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 2rem;
            font-size: 0.78rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .badge-uns-primary {
            background-color: var(--uns-primary-subtle);
            color: var(--uns-primary);
            font-weight: 600;
            padding: 0.35rem 0.65rem;
            border-radius: 2rem;
            font-size: 0.78rem;
        }

        /* Forms */
        .form-label {
            font-weight: 600;
            font-size: 0.86rem;
            color: #334155;
            margin-bottom: 0.4rem;
        }
        .form-control, .form-select {
            border: 1.5px solid #cbd5e1;
            border-radius: 0.5rem;
            padding: 0.55rem 0.85rem;
            font-size: 0.92rem;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--uns-primary-light);
            box-shadow: 0 0 0 0.25rem rgba(128, 0, 0, 0.15);
        }

        /* Stat KPI Cards */
        .stat-card {
            background: #ffffff;
            border: 1px solid var(--uns-card-border);
            border-radius: 0.75rem;
            padding: 1.25rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
        }
        .stat-icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        /* Footer */
        .uns-footer {
            margin-top: auto;
            background-color: #ffffff;
            border-top: 1px solid var(--uns-card-border);
            padding: 1.5rem 0;
            font-size: 0.85rem;
            color: var(--uns-text-muted);
        }
        .uns-footer a {
            color: var(--uns-primary);
            text-decoration: none;
            font-weight: 500;
        }
        .uns-footer a:hover {
            text-decoration: underline;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Topbar Institucional -->
    <div class="uns-topbar d-none d-md-block">
        <div class="container-fluid px-lg-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="bi bi-geo-alt-fill text-warning me-1"></i> Urb. Bellamar s/n, Nuevo Chimbote, Ancash, Perú
                    <span class="mx-2 opacity-50">|</span>
                    <i class="bi bi-mortarboard-fill text-warning me-1"></i> Vicerrectorado Académico
                </div>
                <div class="d-flex align-items-center gap-3">
                    <span><i class="bi bi-shield-check text-warning me-1"></i> Universidad Licenciada por SUNEDU</span>
                    <span class="opacity-50">|</span>
                    <a href="https://www.uns.edu.pe" target="_blank" rel="noopener">Portal Principal UNS <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-xl uns-navbar sticky-top">
        <div class="container-fluid px-lg-4">
            <!-- Brand & Logo -->
            <a class="uns-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-uns.png') }}" alt="Logo UNS">
                <div>
                    <div class="uns-brand-title">Universidad Nacional del Santa</div>
                    <div class="uns-brand-subtitle">Sistema Integrado de Matrícula</div>
                </div>
            </a>

            <!-- Mobile toggler -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainContent" aria-controls="navbarMainContent" aria-expanded="false" aria-label="Navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarMainContent">
                <ul class="navbar-nav mx-auto my-2 my-xl-0 gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('matriculas.*') || request()->routeIs('detalle-matricula.*') ? 'active' : '' }}" href="{{ route('matriculas.index') }}">
                            <i class="bi bi-journal-check"></i> Matrículas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('estudiantes.*') ? 'active' : '' }}" href="{{ route('estudiantes.index') }}">
                            <i class="bi bi-people-fill"></i> Estudiantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cursos.*') ? 'active' : '' }}" href="{{ route('cursos.index') }}">
                            <i class="bi bi-book-fill"></i> Cursos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('horarios.*') ? 'active' : '' }}" href="{{ route('horarios.index') }}">
                            <i class="bi bi-clock-fill"></i> Horarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('aulas.*') ? 'active' : '' }}" href="{{ route('aulas.index') }}">
                            <i class="bi bi-door-open-fill"></i> Aulas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('docentes.*') ? 'active' : '' }}" href="{{ route('docentes.index') }}">
                            <i class="bi bi-person-badge-fill"></i> Docentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('carreras.*') ? 'active' : '' }}" href="{{ route('carreras.index') }}">
                            <i class="bi bi-mortarboard-fill"></i> Carreras
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 mt-2 mt-xl-0">
                    <a href="{{ route('matriculas.create') }}" class="btn btn-uns btn-sm d-flex align-items-center gap-1">
                        <i class="bi bi-plus-circle-fill"></i> Nueva Matrícula
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Header & Breadcrumb Section -->
    @hasSection('header')
        <div class="page-header-uns">
            <div class="container-fluid px-lg-4">
                @yield('header')
            </div>
        </div>
    @endif

    <!-- Main Content Container -->
    <main class="container-fluid px-lg-4 my-4 flex-grow-1">

        <!-- Flash Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 shadow-sm border-0 rounded-3 mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                <div class="flex-grow-1">
                    <strong>¡Operación exitosa!</strong> {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 shadow-sm border-0 rounded-3 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                <div class="flex-grow-1">
                    <strong>Error:</strong> {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 rounded-3 mb-4" role="alert">
                <div class="d-flex align-items-center gap-2 mb-1">
                    <i class="bi bi-exclamation-circle-fill fs-5 text-danger"></i>
                    <strong>Por favor corrige los siguientes errores:</strong>
                </div>
                <ul class="mb-0 ps-4 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Institutional Footer -->
    <footer class="uns-footer">
        <div class="container-fluid px-lg-4">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-1">
                        <img src="{{ asset('images/logo-uns.png') }}" alt="UNS" height="24">
                        <strong class="text-dark">Universidad Nacional del Santa</strong>
                    </div>
                    <p class="mb-0 small text-muted">
                        Sistema Institucional de Gestión de Matrícula &copy; {{ date('Y') }}. Todos los derechos reservados.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end small">
                    <span class="text-muted">Chimbote - Ancash - Perú</span>
                    <span class="mx-2 opacity-50">•</span>
                    <a href="https://www.uns.edu.pe" target="_blank" rel="noopener">Portal Web Institucional</a>
                    <span class="mx-2 opacity-50">•</span>
                    <a href="{{ url('/') }}">Inicio</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
