<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SolidaridApp</title>
    <link href="<?= URL_PATH ?>/public/assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <header class="bg-light shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Logo / Marca -->
                <a class="navbar-brand fw-bold text-warning" href="<?=URL_PATH?>/page/inicio">
                    SolidaridApp
                </a>

                <!-- Botón de colapso (modo móvil) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSolidaridApp" aria-controls="navbarSolidaridApp" aria-expanded="false" aria-label="Menú">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Enlaces de navegación -->
                <div class="collapse navbar-collapse" id="navbarSolidaridApp">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL_PATH ?>/page/inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL_PATH ?>/page/necesidades">Necesidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL_PATH ?>/page/organizaciones">Organizaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL_PATH ?>/registro/inicio">Registrarse</a>
                        </li>
                    </ul>
                    <a href="<?= URL_PATH?>/login/inicio" class="btn btn-warning fw-semibold shadow-sm">
                        Donar Ahora
                    </a>
                </div>
            </div>
        </nav>
    </header>


    <main>