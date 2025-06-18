<?php
include("./Public/components/header.php");
?>

<!-- Hero -->
<section class="bg-warning text-dark text-center py-5">
    <div class="container">
        <h2 class="display-5 fw-bold">Conectamos corazones solidarios con organizaciones que necesitan ayuda</h2>
        <p class="lead">Únete a nuestra red de solidaridad y transforma vidas con tu ayuda</p>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="#" class="btn btn-outline-dark btn-lg">Quiero Donar</a>
            <a href="#" class="btn btn-dark btn-lg">Soy una Organización</a>
        </div>
        <img src="assets/img/hero_donacion.png" alt="Donación comunitaria" class="img-fluid mt-4"
            style="max-height: 300px;">
    </div>
</section>

<!-- ¿Cómo Funciona? -->
<section class="container py-5">
    <h3 class="text-center mb-4">¿Cómo Funciona?</h3>
    <div class="row text-center">
        <div class="col-md-4">
            <img src="assets/img/publicar.png" alt="Paso 1" class="mb-3" height="80">
            <h5>Paso 1</h5>
            <p>Las organizaciones publican sus necesidades</p>
        </div>
        <div class="col-md-4">
            <img src="assets/img/explorar.png" alt="Paso 2" class="mb-3" height="80">
            <h5>Paso 2</h5>
            <p>Los donantes exploran el catálogo</p>
        </div>
        <div class="col-md-4">
            <img src="assets/img/donar.png" alt="Paso 3" class="mb-3" height="80">
            <h5>Paso 3</h5>
            <p>Se concreta la donación</p>
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
    <h3 class="text-center mb-4">Tipos de Organizaciones</h3>
    <div class="row text-center">
        <div class="col-md-3">
            <img src="assets/img/comedor.png" height="60" alt="Comedores">
            <p class="mt-2">Comedores Populares</p>
        </div>
        <div class="col-md-3">
            <img src="assets/img/albergue.png" height="60" alt="Albergues">
            <p class="mt-2">Albergues</p>
        </div>
        <div class="col-md-3">
            <img src="assets/img/escuela.png" height="60" alt="Escuelas">
            <p class="mt-2">Escuelas</p>
        </div>
        <div class="col-md-3">
            <img src="assets/img/otros.png" height="60" alt="Otros">
            <p class="mt-2">Otras organizaciones sociales</p>
        </div>
    </div>
</section>

<?php
include("./Public/components/footer.php");
?>