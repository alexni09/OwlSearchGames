/*
    Sums one number at a time; stores the result in itself.
*/
export function useAccumulate() {
    const accumulate = (function () {
        let sum = 0
        return function (n) {sum += n; return sum}
    })()
    return { accumulate }
}