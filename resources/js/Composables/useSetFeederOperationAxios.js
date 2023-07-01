/*
    Partial code; for TheLightBulbFeeder.
*/
export function useSetFeederOperationAxios() {
    function setFeederOperationAxios(k) {
        axios.post('/api/idea', {
            'operation': k
        })
        .then(function (response) {
            //
        })
        .catch(function (error) {
            console.log(error)
        })
    }
    return { setFeederOperationAxios }
}