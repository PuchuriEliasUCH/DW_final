<?php include(__DIR__ . "/../components/header.php"); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-warning text-dark text-center">
                    <h4 class="mb-0 fw-bold">Registro de Usuario</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="post" action="<?= URL_PATH ?>/App/Controller/loginController.php" id="formRegistro" novalidate>
                        <!-- Tipo de Usuario -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Tipo de usuario</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipoUsuario" id="tipoUsuario1" value="donador" checked>
                                        <label class="form-check-label" for="tipoUsuario1">
                                            <strong>Donador</strong>
                                            <small class="d-block text-muted">Persona que desea hacer donaciones</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipoUsuario" id="tipoUsuario2" value="organizacion">
                                        <label class="form-check-label" for="tipoUsuario2">
                                            <strong>Organización</strong>
                                            <small class="d-block text-muted">Institución que recibe donaciones</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Campos para Donador -->
                        <div id="camposDonador" class="campos-usuario">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombreCompleto" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" required>
                                    <div class="invalid-feedback">
                                        Por favor ingresa tu nombre completo.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="fechaNacimiento" class="form-label">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                                    <div class="invalid-feedback">
                                        Debes ser mayor de 18 años para registrarte.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="text" class="form-control" id="dni" name="dni" pattern="[0-9]{8}" maxlength="8" required>
                                    <div class="invalid-feedback">
                                        Ingresa un DNI válido de 8 dígitos.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="emailDonador" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="emailDonador" name="emailDonador" required>
                                    <div class="invalid-feedback">
                                        Ingresa un correo electrónico válido.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passwordDonador" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="passwordDonador" name="passwordDonador" minlength="6" required>
                                    <div class="invalid-feedback">
                                        La contraseña debe tener al menos 6 caracteres.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="confirmarPasswordDonador" class="form-label">Confirmar contraseña</label>
                                    <input type="password" class="form-control" id="confirmarPasswordDonador" name="confirmarPasswordDonador" minlength="6" required>
                                    <div class="invalid-feedback">
                                        Las contraseñas no coinciden.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Campos para Organización -->
                        <div id="camposOrganizacion" class="campos-usuario" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombreOrganizacion" class="form-label">Nombre de la organización</label>
                                    <input type="text" class="form-control" id="nombreOrganizacion" name="nombreOrganizacion">
                                    <div class="invalid-feedback">
                                        Por favor ingresa el nombre de la organización.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="ruc" class="form-label">RUC</label>
                                    <input type="text" class="form-control" id="ruc" name="ruc" pattern="[0-9]{11}" maxlength="11">
                                    <div class="invalid-feedback">
                                        Ingresa un RUC válido de 11 dígitos.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="emailOrganizacion" class="form-label">Correo institucional</label>
                                    <input type="email" class="form-control" id="emailOrganizacion" name="emailOrganizacion">
                                    <div class="invalid-feedback">
                                        Ingresa un correo electrónico válido.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="telefonoOrganizacion" class="form-label">Teléfono de contacto</label>
                                    <input type="tel" class="form-control" id="telefonoOrganizacion" name="telefonoOrganizacion" pattern="[0-9]{9}" maxlength="9">
                                    <div class="invalid-feedback">
                                        Ingresa un número válido de 9 dígitos.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion">
                                <div class="invalid-feedback">
                                    Por favor ingresa la dirección.
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tipoOrganizacion" class="form-label">Tipo de organización</label>
                                    <select class="form-select" id="tipoOrganizacion" name="tipoOrganizacion">
                                        <option value="">Selecciona una opción</option>
                                        <option value="comedor_popular">Comedor popular</option>
                                        <option value="albergue">Albergue</option>
                                        <option value="escuela">Escuela</option>
                                        <option value="asociacion">Asociación</option>
                                        <option value="otro">Otro</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona el tipo de organización.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3" id="otroTipoContainer" style="display: none;">
                                    <label for="otroTipo" class="form-label">Especifica el tipo</label>
                                    <input type="text" class="form-control" id="otroTipo" name="otroTipo">
                                    <div class="invalid-feedback">
                                        Por favor especifica el tipo de organización.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="descripcionCorta" class="form-label">Descripción corta</label>
                                    <input type="text" class="form-control" id="descripcionCorta" name="descripcionCorta" maxlength="50">
                                    <div class="invalid-feedback">
                                        Ingresa una breve descripción (máx. 50 caracteres).
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="descripcionLarga" class="form-label">Descripción larga</label>
                                    <textarea class="form-control" id="descripcionLarga" name="descripcionLarga" rows="3"></textarea>
                                    <div class="invalid-feedback">
                                        Ingresa una descripción detallada de la organización.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="passwordOrganizacion" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="passwordOrganizacion" name="passwordOrganizacion" minlength="6">
                                    <div class="invalid-feedback">
                                        La contraseña debe tener al menos 6 caracteres.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="confirmarPasswordOrganizacion" class="form-label">Confirmar contraseña</label>
                                    <input type="password" class="form-control" id="confirmarPasswordOrganizacion" name="confirmarPasswordOrganizacion" minlength="6">
                                    <div class="invalid-feedback">
                                        Las contraseñas no coinciden.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botón -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-warning text-dark fw-semibold">Registrarse</button>
                        </div>
                    </form>

                    <!-- Enlaces adicionales -->
                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">¿Ya tienes una cuenta?</p>
                        <a href="<?= URL_PATH ?>/auth/login" class="btn btn-outline-warning mt-2">
                            Inicia sesión aquí
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="<?= URL_PATH ?>/public/assets/js/registro.js"></script>

<?php include(__DIR__ . "/../components/footer.php"); ?>