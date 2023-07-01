/*
    Used in CompleteLayout; onResize event.
*/
export function useDebounce() {
    function debounce(func, wait, immediate) {
        var timeout
        return () => {
            const context = this, args = arguments
            const later = function() {
                timeout = null
                if (!immediate) func.apply(context, args)
            }
            const callNow = immediate && !timeout
            clearTimeout(timeout)
            timeout = setTimeout(later, wait)
            if (callNow) func.apply(context, args)
        }
    }
    return { debounce }
}