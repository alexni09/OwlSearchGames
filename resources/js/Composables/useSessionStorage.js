/*
    Three functions for Session Storage.
    Accepts strings only (for now).
*/
export function useSessionStorage() {
    function getSession(folder, item, fallback = "") {
        let fullItem = folder + '-' + item
        let value = sessionStorage.getItem(fullItem)
        return (value == null ? fallback : value)  
    }
    function removeSession(folder, item) {
        let fullItem = folder + '-' + item
        sessionStorage.removeItem(fullItem)
    }
    function setSession(folder, item, value) {
        let fullItem = folder + '-' + item
        sessionStorage.setItem(fullItem, value)
    }
    return { getSession, removeSession, setSession }
}