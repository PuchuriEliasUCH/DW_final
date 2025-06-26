<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario = $_SESSION['usuario'] ?? null;


?>

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
    <header class="shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top"> <!-- sticky-top agregado -->
            <div class="container">
                <!-- Logo / Marca -->
                <a class="navbar-brand fw-bold text-warning" href="<?= URL_PATH ?>/page/inicio">
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
                    <?php if ($usuario): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle fw-semibold" type="button" id="menuUsuario" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= htmlspecialchars($usuario[0]['email']) ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuUsuario">
                                <li>
                                    <a class="dropdown-item" href="<?= URL_PATH ?>/usuario/perfil">Ver perfil</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= URL_PATH ?>/login/logout">Cerrar sesión</a>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="<?= URL_PATH ?>/login/inicio" class="btn btn-warning fw-semibold shadow-sm">
                            Donar Ahora
                        </a>
                    <?php endif; ?>

                </div>
            </div>
        </nav>
    </header>



    <main>