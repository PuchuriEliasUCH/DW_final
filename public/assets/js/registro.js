document.addEventListener('DOMContentLoaded', function() {
    const formRegistro = document.getElementById('formRegistro');
    const tipoUsuarioRadios = document.querySelectorAll('input[name="tipoUsuario"]');
    const camposDonador = document.getElementById('camposDonador');
    const camposOrganizacion = document.getElementById('camposOrganizacion');
    const tipoOrganizacionSelect = document.getElementById('tipoOrganizacion');
    const otroTipoContainer = document.getElementById('otroTipoContainer');

    // Función para cambiar entre tipos de usuario
    function cambiarTipoUsuario() {
        const tipoSeleccionado = document.querySelector('input[name="tipoUsuario"]:checked').value;
        
        if (tipoSeleccionado === 'donador') {
            camposDonador.style.display = 'block';
            camposOrganizacion.style.display = 'none';
            
            // Habilitar validación para campos de donador
            habilitarValidacion(camposDonador, true);
            habilitarValidacion(camposOrganizacion, false);
        } else {
            camposDonador.style.display = 'none';
            camposOrganizacion.style.display = 'block';
            
            // Habilitar validación para campos de organización
            habilitarValidacion(camposDonador, false);
            habilitarValidacion(camposOrganizacion, true);
        }
        
        // Limpiar errores de validación
        limpiarErroresValidacion();
    }

    // Función para habilitar/deshabilitar validación
    function habilitarValidacion(contenedor, habilitar) {
        const campos = contenedor.querySelectorAll('input, select');
        campos.forEach(campo => {
            if (habilitar) {
                campo.setAttribute('required', '');
            } else {
                campo.removeAttribute('required');
            }
        });
    }

    // Función para limpiar errores de validación
    function limpiarErroresValidacion() {
        const campos = formRegistro.querySelectorAll('.form-control, .form-select');
        campos.forEach(campo => {
            campo.classList.remove('is-invalid');
            campo.classList.remove('is-valid');
        });
    }

    // Función para mostrar/ocultar campo "Otro tipo"
    function manejarTipoOrganizacion() {
        if (tipoOrganizacionSelect.value === 'otro') {
            otroTipoContainer.style.display = 'block';
            document.getElementById('otroTipo').setAttribute('required', '');
        } else {
            otroTipoContainer.style.display = 'none';
            document.getElementById('otroTipo').removeAttribute('required');
            document.getElementById('otroTipo').value = '';
        }
    }

    // Función para validar contraseñas
    function validarContraseñas() {
        const tipoSeleccionado = document.querySelector('input[name="tipoUsuario"]:checked').value;
        let password, confirmarPassword;

        if (tipoSeleccionado === 'donador') {
            password = document.getElementById('passwordDonador');
            confirmarPassword = document.getElementById('confirmarPasswordDonador');
        } else {
            password = document.getElementById('passwordOrganizacion');
            confirmarPassword = document.getElementById('confirmarPasswordOrganizacion');
        }

        if (password.value !== confirmarPassword.value) {
            confirmarPassword.classList.add('is-invalid');
            confirmarPassword.classList.remove('is-valid');
            return false;
        } else {
            confirmarPassword.classList.remove('is-invalid');
            confirmarPassword.classList.add('is-valid');
            return true;
        }
    }

    // Función para validar edad (debe ser mayor o igual a 18 años)
    function validarEdad() {
        const fechaNacimientoInput = document.getElementById('fechaNacimiento');
        const valor = fechaNacimientoInput.value;

        if (!valor) return false;

        const fechaNacimiento = new Date(valor);
        const hoy = new Date();

        // Crear fecha mínima válida para tener 18 años hoy
        const fechaMinima = new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate());

        if (fechaNacimiento <= fechaMinima) {
            fechaNacimientoInput.classList.remove('is-invalid');
            fechaNacimientoInput.classList.add('is-valid');
            return true;
        } else {
            fechaNacimientoInput.classList.add('is-invalid');
            fechaNacimientoInput.classList.remove('is-valid');
            return false;
        }
    }


    // Función para validar DNI
    function validarDNI() {
        const dniInput = document.getElementById('dni');
        const dni = dniInput.value.trim();
        
        if (dni.length === 8 && /^[0-9]+$/.test(dni)) {
            dniInput.classList.remove('is-invalid');
            dniInput.classList.add('is-valid');
            return true;
        } else {
            dniInput.classList.add('is-invalid');
            dniInput.classList.remove('is-valid');
            return false;
        }
    }


    function validarCorreos() {
        const correoDonador = document.getElementById('emailDonador');
        const correoOrganizacion = document.getElementById('emailOrganizacion');
        const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        let valido = true;

        // Validar correo del donador (si está visible)
        if (correoDonador.offsetParent !== null) {
            const valor = correoDonador.value.trim();
            if (regexCorreo.test(valor)) {
                correoDonador.classList.remove('is-invalid');
                correoDonador.classList.add('is-valid');
            } else {
                correoDonador.classList.add('is-invalid');
                correoDonador.classList.remove('is-valid');
                valido = false;
            }
        }

        // Validar correo de la organización (si está visible)
        if (correoOrganizacion.offsetParent !== null) {
            const valor = correoOrganizacion.value.trim();
            if (regexCorreo.test(valor)) {
                correoOrganizacion.classList.remove('is-invalid');
                correoOrganizacion.classList.add('is-valid');
            } else {
                correoOrganizacion.classList.add('is-invalid');
                correoOrganizacion.classList.remove('is-valid');
                valido = false;
            }
        }

        return valido;
    }



    // Función para validar RUC
    function validarRUC() {
        const rucInput = document.getElementById('ruc');
        const ruc = rucInput.value.trim();
        
        if (ruc.length === 11 && /^[0-9]+$/.test(ruc)) {
            rucInput.classList.remove('is-invalid');
            rucInput.classList.add('is-valid');
            return true;
        } else {
            rucInput.classList.add('is-invalid');
            rucInput.classList.remove('is-valid');
            return false;
        }
    }

    // Función para validar teléfono
    function validarTelefono(inputId) {
        const telefonoInput = document.getElementById(inputId);
        const telefono = telefonoInput.value.trim();
        
        if (telefono.length === 9 && /^[0-9]+$/.test(telefono)) {
            telefonoInput.classList.remove('is-invalid');
            telefonoInput.classList.add('is-valid');
            return true;
        } else {
            telefonoInput.classList.add('is-invalid');
            telefonoInput.classList.remove('is-valid');
            return false;
        }
    }

    // Event listeners
    tipoUsuarioRadios.forEach(radio => {
        radio.addEventListener('change', cambiarTipoUsuario);
    });

    tipoOrganizacionSelect.addEventListener('change', manejarTipoOrganizacion);

    // Validación en tiempo real para contraseñas
    document.getElementById('passwordDonador').addEventListener('input', validarContraseñas);
    document.getElementById('confirmarPasswordDonador').addEventListener('input', validarContraseñas);
    document.getElementById('passwordOrganizacion').addEventListener('input', validarContraseñas);
    document.getElementById('confirmarPasswordOrganizacion').addEventListener('input', validarContraseñas);

    // Validación en tiempo real para fecha de nacimiento
    document.getElementById('fechaNacimiento').addEventListener('input', validarEdad);

    // Validación en tiempo real para DNI
    document.getElementById('dni').addEventListener('input', validarDNI);

    // Validación en tiempo real para RUC
    document.getElementById('ruc').addEventListener('input', validarRUC);
    
    document.getElementById('emailDonador').addEventListener('input', validarCorreos);
    document.getElementById('emailOrganizacion').addEventListener('input', validarCorreos);

    // Validación en tiempo real para teléfono de organización
    document.getElementById('telefonoOrganizacion').addEventListener('input', function() {
        validarTelefono('telefonoOrganizacion');
    });

    // Validación del formulario
    formRegistro.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();

        const tipoSeleccionado = document.querySelector('input[name="tipoUsuario"]:checked').value;
        let formularioValido = true;

        // Validar según el tipo de usuario
        if (tipoSeleccionado === 'donador') {
            // Validar campos específicos de donador
            if (!validarCorreos()) formularioValido = false;
            if (!validarEdad()) formularioValido = false;
            if (!validarDNI()) formularioValido = false;
            if (!validarContraseñas()) formularioValido = false;
        } else {
            if (!validarCorreos()) formularioValido = false;
            if (!validarRUC()) formularioValido = false;
            if (!validarTelefono('telefonoOrganizacion')) formularioValido = false;
            if (!validarContraseñas()) formularioValido = false;

            
            // Validar tipo de organización
            if (tipoOrganizacionSelect.value === '') {
                tipoOrganizacionSelect.classList.add('is-invalid');
                formularioValido = false;
            } else {
                tipoOrganizacionSelect.classList.remove('is-invalid');
                tipoOrganizacionSelect.classList.add('is-valid');
            }

            // Validar campo "otro tipo" si está visible
            if (tipoOrganizacionSelect.value === 'otro') {
                const otroTipoInput = document.getElementById('otroTipo');
                if (otroTipoInput.value.trim() === '') {
                    otroTipoInput.classList.add('is-invalid');
                    formularioValido = false;
                } else {
                    otroTipoInput.classList.remove('is-invalid');
                    otroTipoInput.classList.add('is-valid');
                }
            }
        }

        // Validar todos los campos requeridos
        const camposRequeridos = formRegistro.querySelectorAll('[required]');
        camposRequeridos.forEach(campo => {
            if (!campo.checkValidity()) {
                campo.classList.add('is-invalid');
                formularioValido = false;
            } else {
                campo.classList.remove('is-invalid');
                campo.classList.add('is-valid');
            }
        });

        // Si todo es válido, procesar el formulario
        if (formularioValido) {
            console.log('Formulario válido, enviando datos...');
            
            // Recopilar datos del formulario
            const datosFormulario = new FormData(formRegistro);
            
            // Aquí puedes agregar la lógica para enviar los datos al servidor
            // Por ejemplo, usando fetch() para hacer una petición AJAX
            
            console.log('Datos del formulario:', Object.fromEntries(datosFormulario));
            
            // Mostrar mensaje de éxito (temporal)
            alert('Registro exitoso! (Esto es solo una simulación)');
        } else {
            console.log('Formulario inválido');
        }

        formRegistro.classList.add('was-validated');
    });

    // Inicializar el formulario
    cambiarTipoUsuario();
});