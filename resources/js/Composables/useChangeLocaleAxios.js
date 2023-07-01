/*
    Partial code; for LocaleSwitcher and Register new user.
*/
export function useChangeLocaleAxios() {
    function changeLocaleAxios(k) {
        axios.post('/api/locale', {
            'locale': k
        })
        .then(function (response) {
            //
        })
        .catch(function (error) {
            console.log(error)
        })
    }
    return { changeLocaleAxios }
}