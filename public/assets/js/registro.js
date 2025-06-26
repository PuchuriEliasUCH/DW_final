// registro.js (versión optimizada)
import { registroUsuarios } from './utils/baseUrl.js';

document.addEventListener('DOMContentLoaded', function () {
    const formRegistro = document.getElementById('formRegistro');
    const tipoUsuarioRadios = document.querySelectorAll('input[name="tipoUsuario"]');
    const camposDonador = document.getElementById('camposDonador');
    const camposOrganizacion = document.getElementById('camposOrganizacion');
    const tipoOrganizacionSelect = document.getElementById('tipoOrganizacion');
    const otroTipoContainer = document.getElementById('otroTipoContainer');

    function cambiarTipoUsuario() {
        const tipo = document.querySelector('input[name="tipoUsuario"]:checked').value;

        camposDonador.style.display = tipo === 'donador' ? 'block' : 'none';
        camposOrganizacion.style.display = tipo === 'organizacion' ? 'block' : 'none';

        aplicarEstadoValidacion(camposDonador, tipo === 'donador');
        aplicarEstadoValidacion(camposOrganizacion, tipo === 'organizacion');
    }

    function aplicarEstadoValidacion(contenedor, requerido = null) {
        contenedor.querySelectorAll('input, select, textarea').forEach(campo => {
            if (requerido !== null) requerido ? campo.setAttribute('required', '') : campo.removeAttribute('required');
            campo.classList.remove('is-invalid', 'is-valid');
        });
    }

    function manejarTipoOrganizacion() {
        const otroTipo = document.getElementById('otroTipo');
        if (tipoOrganizacionSelect.value === 'otro') {
            otroTipoContainer.style.display = 'block';
            otroTipo.setAttribute('required', '');
        } else {
            otroTipoContainer.style.display = 'none';
            otroTipo.removeAttribute('required');
            otroTipo.value = '';
        }
    }

    function validarContraseñas() {
        const tipo = document.querySelector('input[name="tipoUsuario"]:checked').value;
        const pass = document.getElementById(tipo === 'donador' ? 'passwordDonador' : 'passwordOrganizacion');
        const conf = document.getElementById(tipo === 'donador' ? 'confirmarPasswordDonador' : 'confirmarPasswordOrganizacion');
        const iguales = pass.value === conf.value;
        conf.classList.toggle('is-valid', iguales);
        conf.classList.toggle('is-invalid', !iguales);
        return iguales;
    }

    function validarEdad() {
        const input = document.getElementById('fechaNacimiento');
        if (!input.value) return false;
        const hoy = new Date();
        const fechaMinima = new Date(hoy.getFullYear() - 18, hoy.getMonth(), hoy.getDate());
        const valido = new Date(input.value) <= fechaMinima;
        input.classList.toggle('is-valid', valido);
        input.classList.toggle('is-invalid', !valido);
        return valido;
    }

    function validarCampoNumerico(id, longitud) {
        const input = document.getElementById(id);
        const valor = input.value.trim();
        const valido = valor.length === longitud && /^[0-9]+$/.test(valor);
        input.classList.toggle('is-valid', valido);
        input.classList.toggle('is-invalid', !valido);
        return valido;
    }

    const validarDNI = () => validarCampoNumerico('dni', 8);
    const validarRUC = () => validarCampoNumerico('ruc', 11);
    const validarTelefono = () => validarCampoNumerico('telefonoOrganizacion', 9);

    function validarCorreos() {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let valido = true;
        ['emailDonador', 'emailOrganizacion'].forEach(id => {
            const el = document.getElementById(id);
            if (el && el.offsetParent !== null) {
                const esValido = regex.test(el.value.trim());
                el.classList.toggle('is-valid', esValido);
                el.classList.toggle('is-invalid', !esValido);
                if (!esValido) valido = false;
            }
        });
        return valido;
    }

    function obtenerDatosFormulario(form) {
    const tipo = document.querySelector('input[name="tipoUsuario"]:checked').value;

    if (tipo === 'donador') {
        return {
            email: form.emailDonador.value,
            password: form.passwordDonador.value,
            nombre_completo: form.nombreCompleto.value,
            fecha_nacimiento: form.fechaNacimiento.value,
            dni: form.dni.value
        };
    } else {
        return {
            email: form.emailOrganizacion.value,
            password: form.passwordOrganizacion.value,
            razon_social: form.nombreOrganizacion.value,
            ruc: form.ruc.value,
            telefono: form.telefonoOrganizacion.value,
            direccion: form.direccion.value,
            tipo_organizacion: form.tipoOrganizacion.value,
            otro_tipo: form.otroTipo.value || null,
            descripcion_corta: form.descripcionCorta.value,
            descripcion_larga: form.descripcionLarga.value
        };
    }
}


    // Eventos
    tipoUsuarioRadios.forEach(r => r.addEventListener('change', cambiarTipoUsuario));
    tipoOrganizacionSelect.addEventListener('change', manejarTipoOrganizacion);

    ['passwordDonador', 'confirmarPasswordDonador', 'passwordOrganizacion', 'confirmarPasswordOrganizacion']
        .forEach(id => document.getElementById(id).addEventListener('input', validarContraseñas));

    document.getElementById('fechaNacimiento').addEventListener('input', validarEdad);
    document.getElementById('dni').addEventListener('input', validarDNI);
    document.getElementById('ruc').addEventListener('input', validarRUC);
    document.getElementById('telefonoOrganizacion').addEventListener('input', validarTelefono);
    ['emailDonador', 'emailOrganizacion'].forEach(id => document.getElementById(id).addEventListener('input', validarCorreos));

    formRegistro.addEventListener('submit', async function (event) {
        event.preventDefault();
        event.stopPropagation();

        const tipo = document.querySelector('input[name="tipoUsuario"]:checked').value;
        
        console.log(tipo)
        const validadoresDonador = [validarCorreos, validarEdad, validarDNI, validarContraseñas];
        const validadoresOrg = [validarCorreos, validarRUC, validarTelefono, validarContraseñas];

        let esValido = (tipo === 'donador')
            ? validadoresDonador.every(fn => fn())
            : validadoresOrg.every(fn => fn());

        if (tipo === 'organizacion' && tipoOrganizacionSelect.value === '') {
            tipoOrganizacionSelect.classList.add('is-invalid');
            esValido = false;
        } else {
            tipoOrganizacionSelect.classList.remove('is-invalid');
            tipoOrganizacionSelect.classList.add('is-valid');
        }

        if (tipoOrganizacionSelect.value === 'otro') {
            const otroTipoInput = document.getElementById('otroTipo');
            if (otroTipoInput.value.trim() === '') {
                otroTipoInput.classList.add('is-invalid');
                esValido = false;
            } else {
                otroTipoInput.classList.remove('is-invalid');
                otroTipoInput.classList.add('is-valid');
            }
        }

        formRegistro.querySelectorAll('[required]').forEach(campo => {
            if (!campo.checkValidity()) {
                campo.classList.add('is-invalid');
                esValido = false;
            } else {
                campo.classList.remove('is-invalid');
                campo.classList.add('is-valid');
            }
        });

        if (!esValido) return console.log('Formulario inválido');

        const datos = obtenerDatosFormulario(formRegistro);

        try {

            const res = await registroUsuarios(datos);
            if (!res?.esCorrecto) {
                alert(`Error: ${res?.mensajes || 'Error desconocido'}`);
            } else {
                window.location.href = '/login/inicio';
            }
        } catch (err) {
            console.error('Error al registrar.', err);
            alert('Error de conexión. Intenta nuevamente.');
        }
    });

    cambiarTipoUsuario();
});
