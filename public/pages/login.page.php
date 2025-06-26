<?php include(__DIR__ . "/../components/header.php");?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-dark text-center">
                    <h4 class="mb-0 fw-bold">Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" id="formLogin" novalidate>
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Ingresa un correo electrónico válido.
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Ingresa tu contraseña.
                            </div>
                        </div>

                        <!-- Recordar sesión -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="recordar" name="recordar">
                            <label class="form-check-label" for="recordar">
                                Recordar sesión
                            </label>
                        </div>

                        <!-- Botón -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning text-dark fw-semibold">Ingresar</button>
                        </div>
                    </form>

                    <!-- Enlaces adicionales -->
                    <div class="text-center mt-3">
                        <a href="https://youtu.be/fRr5bXJ8FKk?si=PLb369VZmiLXkkfV" class="text-decoration-none">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                    
                    <hr class="my-4">
                    
                    <div class="text-center">
                        <p class="mb-0">¿No tienes una cuenta?</p>
                        <a href="<?= URL_PATH ?>/page/registro" class="btn btn-outline-warning mt-2">
                            Regístrate aquí
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="<?= URL_PATH ?>/public/assets/js/login.js"></script>

<?php include(__DIR__ . "/../components/footer.php"); ?>