<?php
include(__DIR__ . "/../components/header.php");
?>

<!-- Hero de Organizaciones -->
<section class="bg-warning text-dark py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold mb-2">Directorio de Organizaciones</h2>
                <p class="mb-0">Conoce a las organizaciones que hacen la diferencia en nuestra comunidad</p>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="badge bg-dark fs-6">Total: 15 organizaciones</span>
            </div>
        </div>
    </div>
</section>

<!-- Filtros -->
<section class="bg-light py-4">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <select class="form-select" id="filtroTipoOrganizacion">
                    <option value="">Todos los tipos</option>
                    <option value="comedor">Comedores Populares</option>
                    <option value="albergue">Albergues</option>
                    <option value="escuela">Instituciones Educativas</option>
                    <option value="salud">Centros de Salud</option>
                    <option value="fundacion">Fundaciones</option>
                    <option value="otros">Otras Organizaciones</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="filtroUbicacion">
                    <option value="">Todas las ubicaciones</option>
                    <option value="lima">Lima Centro</option>
                    <option value="norte">Lima Norte</option>
                    <option value="sur">Lima Sur</option>
                    <option value="este">Lima Este</option>
                    <option value="callao">Callao</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar organización..." id="busqueda">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Directorio de Organizaciones -->
<section class="container py-5">
    <div class="row g-4" id="directorioOrganizaciones">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Comedor Santa María</h5>
                        <span class="badge bg-primary">Comedor Popular</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> 20123456789</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> San Juan de Lurigancho</p>
                    <p class="card-text text-muted mb-3">Brindamos alimentación diaria a 150 familias de bajos recursos en la zona.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-users"></i> 150 familias atendidas
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('Comedor Santa María')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('Comedor Santa María')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Albergue Esperanza</h5>
                        <span class="badge bg-success">Albergue</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> 20234567890</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> Cercado de Lima</p>
                    <p class="card-text text-muted mb-3">Refugio temporal para personas en situación de calle con servicios básicos.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-bed"></i> 80 camas disponibles
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('Albergue Esperanza')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('Albergue Esperanza')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Centro de Salud Comunitario</h5>
                        <span class="badge bg-danger">Centro de Salud</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> 20345678901</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> Villa El Salvador</p>
                    <p class="card-text text-muted mb-3">Atención médica primaria gratuita para la comunidad de Villa El Salvador.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-heartbeat"></i> 200 consultas/mes
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('Centro de Salud Comunitario')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('Centro de Salud Comunitario')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Escuela Primaria Los Ángeles</h5>
                        <span class="badge bg-info">Institución Educativa</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> 20456789012</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> Ate</p>
                    <p class="card-text text-muted mb-3">Educación primaria gratuita para niños de la comunidad de Ate.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-graduation-cap"></i> 200 estudiantes
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('Escuela Primaria Los Ángeles')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('Escuela Primaria Los Ángeles')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Hogar de Niños San José</h5>
                        <span class="badge bg-warning text-dark">Fundación</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> 20567890123</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> Callao</p>
                    <p class="card-text text-muted mb-3">Hogar de acogida para niños en situación de vulnerabilidad.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-child"></i> 50 niños acogidos
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('Hogar de Niños San José')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('Hogar de Niños San José')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Albergue Mujeres en Acción</h5>
                        <span class="badge bg-success">Albergue</span>
                    </div>
                    <p class="card-text mb-2"><strong>RUC:</strong> 20678901234</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> La Victoria</p>
                    <p class="card-text text-muted mb-3">Refugio especializado para mujeres en situación de violencia.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt"></i> 24h protección
                        </small>
                        <div class="btn-group" role="group">
                            <button class="btn btn-outline-warning btn-sm" onclick="verDetalles('Albergue Mujeres en Acción')">
                                <i class="fas fa-eye"></i> Ver más
                            </button>
                            <button class="btn btn-warning btn-sm text-dark" onclick="contactarOrganizacion('Albergue Mujeres en Acción')">
                                <i class="fas fa-envelope"></i> Contactar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paginación -->
    <nav aria-label="Navegación del directorio" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
            </li>
        </ul>
    </nav>
</section>

<!-- Call to Action -->
<section class="bg-warning text-dark py-5">
    <div class="container text-center">
        <h3 class="fw-bold mb-3">¿Eres una organización?</h3>
        <p class="lead mb-4">Únete a nuestra red de organizaciones solidarias</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?= URL_PATH ?>/registro/inicio" class="btn btn-outline-dark btn-lg">Registrar Organización</a>
            <a href="<?= URL_PATH ?>/page/necesidades" class="btn btn-dark btn-lg">Ver Necesidades</a>
        </div>
    </div>
</section>

<script src="<?= URL_PATH ?>/public/assets/js/organizaciones.js"></script>

<?php
include(__DIR__ . "/../components/footer.php");
?>