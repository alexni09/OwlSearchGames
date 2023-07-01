export function useRandom() {
    function getRandomIntInclusive(min, max) {
        if ((arguments.length < 1 ) || (arguments.length > 2)) return null
        else if (arguments.length === 1 ) {
            if (!Number.isFinite(min)) return null
            max = Math.floor(min)
            min = 1
        } else {
            if (!Number.isFinite(min) || !Number.isFinite(max)) return null
            min = Math.ceil(min)
            max = Math.floor(max)
        }
        return min <= max ? Math.floor(Math.random() * (max - min + 1) + min) : Math.floor(Math.random() * (min - max + 1) + max)
    }
    function percentage(v) {
        if (!Number.isFinite(v)) return null
        else return getRandomIntInclusive(100) <= v
    }
    return { getRandomIntInclusive, percentage }
}