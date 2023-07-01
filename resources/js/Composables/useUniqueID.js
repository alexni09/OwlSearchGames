export function useUniqueID() {
    function uniqueID() {
        return 'id' + Date.now().toString(36) + Math.random().toString(36).slice(2)
    }
    return { uniqueID }
}