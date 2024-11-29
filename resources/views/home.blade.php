<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            padding: 60px 0;
            background-color: #f0f8ff;
            text-align: center;
        }

        .card-stat {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .btn-lg {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Centro Radiológico Dental TOMODENT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active"><a class="nav-link" href="#">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="/atenciones">Atenciones</a></li>
                <li class="nav-item"><a class="nav-link" href="/pacientes">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link" href="/dentistas">Dentistas</a></li>
                <li class="nav-item"><a class="nav-link" href="/servicios">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="/reportes">Reportes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sección Hero -->
<section class="hero-section">
    <div class="container">
        <h1 class="display-4">Bienvenido al Centro Radiológico Dental TOMODENT</h1>
        <p class="lead">Tecnología avanzada para tu salud dental y atención personalizada.</p>
        <a href="{{ route('atenciones.create') }}" class="btn btn-success btn-lg">Registrar Nueva Atención</a>
    </div>
</section>

<!-- Estadísticas y Acciones Rápidas -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card-stat">
                <h4>Total de Atenciones</h4>
                <p class="display-4">{{ $totalAtenciones }}</p>
                <p>Atenciones registradas esta semana</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-stat">
                <h4>Total de Puntos</h4>
                <p class="display-4">{{ $totalPuntos }}</p>
                <p>Puntos acumulados</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-stat">
                <h4>Últimas Atenciones</h4>
                <ul class="list-unstyled">
                    @foreach($ultimasAtenciones as $atencion)
                        <li><small>{{ $atencion->paciente->nombre }} - {{ $atencion->servicio->nombre }}</small></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Botones de acción rápida -->
<div class="text-center mt-4">
    <a href="{{ route('atenciones.create') }}" class="btn btn-success btn-lg mx-2">Registrar Nueva Atención</a>
    <a href="{{ route('reportes.index') }}" class="btn btn-primary btn-lg mx-2">Ver Reportes</a>
    <a href="{{ route('servicios.index') }}" class="btn btn-warning btn-lg mx-2">Servicios Disponibles</a>
</div>

<!-- Pie de página -->
<footer class="footer">
    <p>Centro Radiológico Dental TOMODENT | Teléfono: 984458301 | Dirección: Ernesto Rivero 669-B, Puerto Maldonado</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
