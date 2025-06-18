<?php
include("./Public/components/header.php");
?>

<!-- Hero -->
<section class="text-light text-center py-5" style="
    background: url('<?= URL_PATH ?>/public/assets/imgs/hero_donacion.png') center/cover no-repeat;
    min-height: 400px;
    position: relative;
">
    <div class="container" style="background-color: rgba(0, 0, 0, 0.5); padding: 2rem; border-radius: 0.5rem;">
        <h2 class="display-5 fw-bold">Conectamos corazones solidarios con organizaciones que necesitan ayuda</h2>
        <p class="lead">Únete a nuestra red de solidaridad y transforma vidas con tu ayuda</p>
        <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">
            <a href="#" class="btn btn-outline-light btn-lg">Quiero Donar</a>
            <a href="#" class="btn btn-warning btn-lg text-dark fw-semibold">Soy una Organización</a>
        </div>
    </div>
</section>

<!-- ¿Cómo Funciona? -->
<section class="container py-5">
    <h3 class="text-center mb-5 fw-bold">¿Cómo Funciona?</h3>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-lg h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/publicar.png" alt="Paso 1" class="mb-4" style="height: 100px;">
                    <h5 class="fw-bold">Paso 1</h5>
                    <p class="text-muted">Las organizaciones publican sus necesidades en la plataforma</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-lg h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/explorar.png" alt="Paso 2" class="mb-4" style="height: 100px;">
                    <h5 class="fw-bold">Paso 2</h5>
                    <p class="text-muted">Los donantes exploran el catálogo según sus intereses</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center border-0 shadow-lg h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/donar.png" alt="Paso 3" class="mb-4" style="height: 100px;">
                    <h5 class="fw-bold">Paso 3</h5>
                    <p class="text-muted">Se concreta la donación y se notifica a la organización</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Necesidades Destacadas -->
<section class="bg-light py-5">
    <div class="container">
        <h3 class="text-center mb-4">Necesidades Destacadas</h3>
        <div class="row">
            <!-- Card ejemplo -->
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Alimentos no perecibles</h5>
                        <p class="card-text"><strong>Organización:</strong> Comedor Santa María</p>
                        <p class="text-danger">Alta urgencia</p>
                        <span class="badge bg-secondary">Categoría: Alimentos</span>
                    </div>
                </div>
            </div>
            <!-- Repetir 3-4 tarjetas similares -->
            <!-- ... -->
        </div>
        <div class="text-center">
            <a href="#" class="btn btn-outline-warning">Ver todas las necesidades</a>
        </div>
    </div>
</section>

<!-- Tipos de Organizaciones -->
<section class="container py-5">
    <h3 class="text-center mb-5 fw-bold">Tipos de Organizaciones</h3>
    <div class="row g-4 justify-content-center">
        <div class="col-6 col-md-3">
            <div class="card text-center border-0 shadow-sm h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/comedor.png" alt="Comedores" class="mb-3" style="height: 80px;">
                    <p class="fw-semibold mb-0">Comedores Populares</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center border-0 shadow-sm h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/albergue.png" alt="Albergues" class="mb-3" style="height: 80px;">
                    <p class="fw-semibold mb-0">Albergues</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center border-0 shadow-sm h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/escuela.png" alt="Escuelas" class="mb-3" style="height: 80px;">
                    <p class="fw-semibold mb-0">Escuelas</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center border-0 shadow-sm h-100">
                <div class="card-body">
                    <img src="<?= URL_PATH ?>/public/assets/imgs/otros.png" alt="Otros" class="mb-3" style="height: 80px;">
                    <p class="fw-semibold mb-0">Otras organizaciones</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("./Public/components/footer.php");
?>