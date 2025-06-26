<?php
include_once(__DIR__ . "/../components/header.php");
?>

<!-- Hero del Catálogo -->
<section class="bg-warning text-dark py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="fw-bold mb-2">Catálogo de Necesidades</h2>
                <p class="mb-0">Descubre las organizaciones que necesitan tu ayuda</p>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="badge bg-dark fs-6">Total: 24 necesidades</span>
            </div>
        </div>
    </div>
</section>

<!-- Filtros -->
<section class="bg-light py-4">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-3">
                <select class="form-select" id="filtroCategoria">
                    <option value="">Todas las categorías</option>
                    <option value="alimentos">Alimentos</option>
                    <option value="ropa">Ropa y Vestimenta</option>
                    <option value="medicinas">Medicinas</option>
                    <option value="utiles">Útiles Escolares</option>
                    <option value="juguetes">Juguetes</option>
                    <option value="otros">Otros</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filtroUrgencia">
                    <option value="">Todas las urgencias</option>
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="filtroOrganizacion">
                    <option value="">Tipo de organización</option>
                    <option value="comedor">Comedores Populares</option>
                    <option value="albergue">Albergues</option>
                    <option value="escuela">Escuelas</option>
                    <option value="otros">Otras organizaciones</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar..." id="busqueda">

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Catálogo de Necesidades -->
<section class="container py-5">
    <div class="row g-4" id="catalogoNecesidades">
        <!-- Card 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h5 class="card-title fw-bold">Alimentos no perecibles</h5>
                        <span class="badge bg-danger">Alta urgencia</span>
                    </div>
                    <p class="card-text mb-2"><strong>Organización:</strong> Comedor Santa María</p>
                    <p class="card-text mb-2"><strong>Ubicación:</strong> San Juan de Lurigancho</p>
                    <p class="card-text text-muted mb-3">Necesitamos arroz, fideos, aceite y enlatados para alimentar a 150 familias diariamente.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-secondary">Alimentos</span>
                        <button class="btn btn-warning btn-sm text-dark fw-semibold">Donar Ahora</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paginación -->
    <nav aria-label="Navegación del catálogo" class="mt-5">
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
        <h3 class="fw-bold mb-3">¿No encontraste lo que buscabas?</h3>
        <p class="lead mb-4">Explora más organizaciones</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?= URL_PATH ?>/page/organizaciones" class="btn btn-outline-dark btn-lg">Ver Todas las Organizaciones</a>
        </div>
    </div>
</section>


<script type="module" src="<?= URL_PATH ?>/public/assets/js/necesidades.js"></script>

<?php
include_once(__DIR__ . "/../components/footer.php");
?>