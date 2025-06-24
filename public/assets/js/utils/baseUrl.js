const BASE_URL = 'http://localhost:80/'

export const vistas = async (ruta) => {
    try{
        const res = await fetch(`${BASE_URL}${ruta}`);
        return await res.json();
    }catch (e){
        console.error("Error: " + e)
    }
}