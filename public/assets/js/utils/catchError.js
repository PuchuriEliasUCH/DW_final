const catchError = async (fun) => {
    return async (...args) => {
        try {
            await fn(...args)
        } catch (error) {
            console.error('Error:', e)
        }
    }
}