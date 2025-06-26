const BASE_URL = 'https://app-51b42f50-d3e0-46f6-bc90-779f62bc2b53.cleverapps.io/'

// 'https://app-51b42f50-d3e0-46f6-bc90-779f62bc2b53.cleverapps.io/'
// 'http://localhost:80/'

export const vistas = async (ruta) => {
    try {
        const res = await fetch(`${BASE_URL}${ruta}`);
        return await res.json();
    } catch (e) {
        console.error("Error: " + e)
    }
}

export const login = async (datos) => {
    try {
        const res = await fetch(`${BASE_URL}login/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        });

        return await res.json();
    } catch (e) {
        console.error(e);
    }
}

export const registroUsuarios = async (datos) => {
    try {
        const res = await fetch(`${BASE_URL}usuario/registrar`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        });

        return await res.json();
    } catch (e) {
        console.error(e);
    }
}