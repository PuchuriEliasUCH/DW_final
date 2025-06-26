import { login } from './utils/baseUrl.js'
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('formLogin');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        form.classList.add('was-validated');

        const datos = {
            email: form.email.value,
            password: form.password.value,
            recordar: form.recordar.checked
        };

        try {
            const res = await login(datos);

            if (!res.esCorrecto) {
                alert(`Error: ${res.mensajes}`);
            } else {
                res.resultados;
                window.location.href = '/page/necesidades';
            }
        } catch (err) {
            console.error('Error en el login:', err);
            alert('Error de conexión. Intenta nuevamente.');
        }
    });

    // Bloqueo opcional del Enter
    form.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });
});
