// BLOQUEO de números en el campo nombre
document.getElementById('nombre').addEventListener('keypress', function (e) {
    const key = e.key;
    if (/\d/.test(key)) {
        e.preventDefault();
    }
});

// BLOQUEO de letras y símbolos en teléfono, incluyendo "e"
document.getElementById('telefono').addEventListener('keypress', function (e) {
    const key = e.key;
    if (!/^\d$/.test(key)) {
        e.preventDefault();
    }
});

// Validación al enviar
document.getElementById('formRegistro').addEventListener('submit', function (e) {
    e.preventDefault();
    let errores = [];

    const nombre = document.getElementById('nombre').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const email = document.getElementById('email').value.trim();
    const contrasena = document.getElementById('contrasena').value.trim();

    // Nombre
    if (!nombre) {
        errores.push("El nombre es obligatorio.");
    } else if (nombre.length > 50) {
        errores.push("El nombre no debe superar los 50 caracteres.");
    }

    // Teléfono
    if (!telefono) {
        errores.push("El teléfono es obligatorio.");
    } else if (!/^\d{9}$/.test(telefono)) {
        errores.push("El teléfono debe tener exactamente 9 dígitos.");
    }

    // Email
    if (!email) {
        errores.push("El email es obligatorio.");
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        errores.push("El email no es válido.");
    }

    // Contraseña
    if (!contrasena) {
        errores.push("La contraseña es obligatoria.");
    }

    // Mostrar errores
    const divErrores = document.getElementById('errores');
    if (errores.length > 0) {
        divErrores.innerHTML = errores.join("<br>");
    } else {
        divErrores.innerHTML = "Formulario válido. Enviando...";
        // Aquí podrías continuar con el envío real
    }
});
