/*
    Three functions for Local Storage.
    Accept strings only (for now).
*/
export function useLocalStorage() {
    function getLocal(folder, item, fallback = "") {
        let fullItem = folder + '-' + item
        let value = localStorage.getItem(fullItem)
        return (value == null ? fallback : value)  
    }
    function removeLocal(folder, item) {
        let fullItem = folder + '-' + item
        localStorage.removeItem(fullItem)
    }
    function setLocal(folder, item, value) {
        let fullItem = folder + '-' + item
        localStorage.setItem(fullItem, value)
    }
    return { getLocal, removeLocal, setLocal }
}