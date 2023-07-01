import Swal from 'sweetalert2'
export function useFlash() {
    function flash(title, message, level = "success") {
        Swal.fire({
            icon: level,
            title: title,
            text: message,
            timer: 3000
        })
    }
    function flash2(obj) {
        Swal.fire(obj)
    }
    return { flash, flash2 }
}